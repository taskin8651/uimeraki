<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\ResourceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with(['category', 'media'])
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        $categories = ResourceCategory::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->pluck('name', 'id');

        return view('admin.resources.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'resource_category_id' => 'nullable|exists:resource_categories,id',

            'title'                => 'required|string|max:255',
            'slug'                 => 'nullable|string|max:255|unique:resources,slug',
            'short_description'    => 'nullable|string',
            'content'              => 'nullable|string',

            'type_label'           => 'nullable|string|max:255',
            'type_icon'            => 'nullable|string|max:255',
            'main_icon'            => 'nullable|string|max:255',
            'media_color_class'    => 'nullable|string|max:255',

            'read_time'            => 'nullable|string|max:255',
            'industry_or_meta'     => 'nullable|string|max:255',
            'tags'                 => 'nullable|string',

            'button_text'          => 'nullable|string|max:255',
            'button_url'           => 'nullable|string|max:255',

            'is_featured'          => 'nullable|boolean',
            'sort_order'           => 'nullable|integer|min:0',
            'status'               => 'nullable|boolean',

            'resource_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'resource_file'        => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip|max:10240',
        ]);

        $resource = Resource::create([
            'resource_category_id' => $request->resource_category_id,

            'title'                => $request->title,
            'slug'                 => $request->slug ?: Str::slug($request->title),
            'short_description'    => $request->short_description,
            'content'              => $request->content,

            'type_label'           => $request->type_label,
            'type_icon'            => $request->type_icon,
            'main_icon'            => $request->main_icon,
            'media_color_class'    => $request->media_color_class,

            'read_time'            => $request->read_time,
            'industry_or_meta'     => $request->industry_or_meta,
            'tags'                 => $request->tags,

            'button_text'          => $request->button_text,
            'button_url'           => $request->button_url,

            'is_featured'          => $request->has('is_featured') ? 1 : 0,
            'sort_order'           => $request->sort_order ?? 0,
            'status'               => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('resource_image')) {
            $resource
                ->addMediaFromRequest('resource_image')
                ->toMediaCollection('resource_image');
        }

        if ($request->hasFile('resource_file')) {
            $resource
                ->addMediaFromRequest('resource_file')
                ->toMediaCollection('resource_file');
        }

        return redirect()
            ->route('admin.resources.index')
            ->with('success', 'Resource created successfully.');
    }

    public function show(Resource $resource)
    {
        $resource->load(['category', 'media']);

        return view('admin.resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        $resource->load('media');

        $categories = ResourceCategory::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->pluck('name', 'id');

        return view('admin.resources.edit', compact('resource', 'categories'));
    }

    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'resource_category_id' => 'nullable|exists:resource_categories,id',

            'title'                => 'required|string|max:255',
            'slug'                 => 'nullable|string|max:255|unique:resources,slug,' . $resource->id,
            'short_description'    => 'nullable|string',
            'content'              => 'nullable|string',

            'type_label'           => 'nullable|string|max:255',
            'type_icon'            => 'nullable|string|max:255',
            'main_icon'            => 'nullable|string|max:255',
            'media_color_class'    => 'nullable|string|max:255',

            'read_time'            => 'nullable|string|max:255',
            'industry_or_meta'     => 'nullable|string|max:255',
            'tags'                 => 'nullable|string',

            'button_text'          => 'nullable|string|max:255',
            'button_url'           => 'nullable|string|max:255',

            'is_featured'          => 'nullable|boolean',
            'sort_order'           => 'nullable|integer|min:0',
            'status'               => 'nullable|boolean',

            'resource_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'resource_file'        => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip|max:10240',
            'remove_image'         => 'nullable|boolean',
            'remove_file'          => 'nullable|boolean',
        ]);

        $resource->update([
            'resource_category_id' => $request->resource_category_id,

            'title'                => $request->title,
            'slug'                 => $request->slug ?: Str::slug($request->title),
            'short_description'    => $request->short_description,
            'content'              => $request->content,

            'type_label'           => $request->type_label,
            'type_icon'            => $request->type_icon,
            'main_icon'            => $request->main_icon,
            'media_color_class'    => $request->media_color_class,

            'read_time'            => $request->read_time,
            'industry_or_meta'     => $request->industry_or_meta,
            'tags'                 => $request->tags,

            'button_text'          => $request->button_text,
            'button_url'           => $request->button_url,

            'is_featured'          => $request->has('is_featured') ? 1 : 0,
            'sort_order'           => $request->sort_order ?? 0,
            'status'               => $request->has('status') ? 1 : 0,
        ]);

        if ($request->has('remove_image')) {
            $resource->clearMediaCollection('resource_image');
        }

        if ($request->has('remove_file')) {
            $resource->clearMediaCollection('resource_file');
        }

        if ($request->hasFile('resource_image')) {
            $resource
                ->clearMediaCollection('resource_image');

            $resource
                ->addMediaFromRequest('resource_image')
                ->toMediaCollection('resource_image');
        }

        if ($request->hasFile('resource_file')) {
            $resource
                ->clearMediaCollection('resource_file');

            $resource
                ->addMediaFromRequest('resource_file')
                ->toMediaCollection('resource_file');
        }

        return redirect()
            ->route('admin.resources.index')
            ->with('success', 'Resource updated successfully.');
    }

    public function destroy(Resource $resource)
    {
        $resource->clearMediaCollection('resource_image');
        $resource->clearMediaCollection('resource_file');

        $resource->delete();

        return redirect()
            ->route('admin.resources.index')
            ->with('success', 'Resource deleted successfully.');
    }
}