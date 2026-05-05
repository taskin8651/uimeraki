<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\ResourcePage;
use Illuminate\Http\Request;

class ResourcePageController extends Controller
{
    public function index()
    {
        $resourcePage = ResourcePage::latest()->first();

        if (!$resourcePage) {
            $resourcePage = ResourcePage::create([
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
                'status'             => 1,
            ]);
        }

        return view('admin.resource-pages.index', compact('resourcePage'));
    }

    public function create()
    {
        return redirect()->route('admin.resource-pages.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.resource-pages.index');
    }

    public function show(ResourcePage $resourcePage)
    {
        return view('admin.resource-pages.show', compact('resourcePage'));
    }

    public function edit(ResourcePage $resourcePage)
    {
        $resources = Resource::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->pluck('title', 'id');

        return view('admin.resource-pages.edit', compact('resourcePage', 'resources'));
    }

    public function update(Request $request, ResourcePage $resourcePage)
    {
        $request->validate([
            'hero_eyebrow'         => 'nullable|string|max:255',
            'hero_title'           => 'nullable|string',
            'hero_description'     => 'nullable|string',
            'search_placeholder'   => 'nullable|string|max:255',
            'quick_tags'           => 'nullable|string',

            'meta_1_value'         => 'nullable|string|max:255',
            'meta_1_label'         => 'nullable|string|max:255',
            'meta_2_value'         => 'nullable|string|max:255',
            'meta_2_label'         => 'nullable|string|max:255',
            'meta_3_value'         => 'nullable|string|max:255',
            'meta_3_label'         => 'nullable|string|max:255',

            'featured_label'       => 'nullable|string|max:255',
            'featured_resource_id' => 'nullable|exists:resources,id',

            'status'               => 'nullable|boolean',
        ]);

        $resourcePage->update([
            'hero_eyebrow'         => $request->hero_eyebrow,
            'hero_title'           => $request->hero_title,
            'hero_description'     => $request->hero_description,
            'search_placeholder'   => $request->search_placeholder,
            'quick_tags'           => $request->quick_tags,

            'meta_1_value'         => $request->meta_1_value,
            'meta_1_label'         => $request->meta_1_label,
            'meta_2_value'         => $request->meta_2_value,
            'meta_2_label'         => $request->meta_2_label,
            'meta_3_value'         => $request->meta_3_value,
            'meta_3_label'         => $request->meta_3_label,

            'featured_label'       => $request->featured_label,
            'featured_resource_id' => $request->featured_resource_id,

            'status'               => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.resource-pages.index')
            ->with('success', 'Resource page updated successfully.');
    }

    public function destroy(ResourcePage $resourcePage)
    {
        return redirect()
            ->route('admin.resource-pages.index')
            ->with('success', 'Resource page cannot be deleted. You can update it instead.');
    }
}