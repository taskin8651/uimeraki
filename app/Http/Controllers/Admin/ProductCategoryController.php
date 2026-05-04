<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::latest()->paginate(10);

        return view('admin.product-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.product-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255|unique:product_categories,name',
            'slug'       => 'nullable|string|max:255|unique:product_categories,slug',
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        ProductCategory::create([
            'name'       => $request->name,
            'slug'       => $request->slug ?: Str::slug($request->name),
            'icon'       => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Product category created successfully.');
    }

    public function show(ProductCategory $productCategory)
    {
        return view('admin.product-categories.show', compact('productCategory'));
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product-categories.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name'       => 'required|string|max:255|unique:product_categories,name,' . $productCategory->id,
            'slug'       => 'nullable|string|max:255|unique:product_categories,slug,' . $productCategory->id,
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $productCategory->update([
            'name'       => $request->name,
            'slug'       => $request->slug ?: Str::slug($request->name),
            'icon'       => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Product category updated successfully.');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Product category deleted successfully.');
    }
}