<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\ResourcePage;
use Illuminate\Http\Request;

class ResourcePageController extends Controller
{
    public function index(Request $request)
    {
        $resourcePage = ResourcePage::active()
            ->with('featuredResource.media', 'featuredResource.category')
            ->latest()
            ->first();

        if (!$resourcePage) {
            $resourcePage = new ResourcePage([
                'hero_eyebrow'       => 'Knowledge Center',
                'hero_title'         => 'Guides, technical notes & insights on aluminium foil packaging.',
                'hero_description'   => 'Browse primers, troubleshooting guides, and spec sheets to help your team design better packs, validate materials, and reduce sealing issues.',
                'search_placeholder' => 'Search by topic, industry or keyword…',
                'quick_tags'         => 'Blister vs strip, Sealing issues, Food & Dairy, Recyclability',
                'meta_1_value'       => '24+',
                'meta_1_label'       => 'Articles',
                'meta_2_value'       => '8',
                'meta_2_label'       => 'Tech notes',
                'meta_3_value'       => '4',
                'meta_3_label'       => 'Industries',
                'featured_label'     => 'Featured Resource',
            ]);
        }

        $categories = ResourceCategory::active()
            ->withCount(['resources' => function ($query) {
                $query->where('status', 1);
            }])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $resourcesQuery = Resource::with(['category', 'media'])
            ->active()
            ->orderBy('sort_order')
            ->latest();

        if ($request->filled('category') && $request->category !== 'all') {
            $resourcesQuery->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $resourcesQuery->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->orWhere('tags', 'like', '%' . $search . '%')
                    ->orWhere('industry_or_meta', 'like', '%' . $search . '%');
            });
        }

        $resources = $resourcesQuery->paginate(9)->withQueryString();

        $featuredResource = null;

        if ($resourcePage->featuredResource && $resourcePage->featuredResource->status) {
            $featuredResource = $resourcePage->featuredResource;
        }

        if (!$featuredResource) {
            $featuredResource = Resource::with(['category', 'media'])
                ->active()
                ->featured()
                ->orderBy('sort_order')
                ->latest()
                ->first();
        }

        return view('frontend.resources', compact(
            'resourcePage',
            'categories',
            'resources',
            'featuredResource'
        ));
    }

    public function show($slug)
    {
        $resource = Resource::with(['category', 'media'])
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedResources = Resource::with(['category', 'media'])
            ->active()
            ->where('id', '!=', $resource->id)
            ->when($resource->resource_category_id, function ($query) use ($resource) {
                $query->where('resource_category_id', $resource->resource_category_id);
            })
            ->orderBy('sort_order')
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.resource-detail', compact('resource', 'relatedResources'));
    }
}