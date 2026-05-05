<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResourceCategoryController extends Controller
{
    public function index()
    {
        $categories = ResourceCategory::withCount('resources')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.resource-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.resource-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255|unique:resource_categories,slug',
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        ResourceCategory::create([
            'name'       => $request->name,
            'slug'       => $request->slug ?: Str::slug($request->name),
            'icon'       => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.resource-categories.index')
            ->with('success', 'Resource category created successfully.');
    }

    public function show(ResourceCategory $resourceCategory)
    {
        $resourceCategory->load('resources');

        return view('admin.resource-categories.show', compact('resourceCategory'));
    }

    public function edit(ResourceCategory $resourceCategory)
    {
        return view('admin.resource-categories.edit', compact('resourceCategory'));
    }

    public function update(Request $request, ResourceCategory $resourceCategory)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255|unique:resource_categories,slug,' . $resourceCategory->id,
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $resourceCategory->update([
            'name'       => $request->name,
            'slug'       => $request->slug ?: Str::slug($request->name),
            'icon'       => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.resource-categories.index')
            ->with('success', 'Resource category updated successfully.');
    }

    public function destroy(ResourceCategory $resourceCategory)
    {
        $resourceCategory->delete();

        return redirect()
            ->route('admin.resource-categories.index')
            ->with('success', 'Resource category deleted successfully.');
    }
}