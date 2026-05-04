<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'name'                => 'required|string|max:255|unique:products,name',
            'slug'                => 'nullable|string|max:255|unique:products,slug',

            'short_description'   => 'nullable|string',
            'description'         => 'nullable|string',

            'thickness'           => 'nullable|string|max:255',
            'material_type'       => 'nullable|string|max:255',
            'application'         => 'nullable|string|max:255',
            'key_feature'         => 'nullable|string|max:255',
            'options'             => 'nullable|string|max:255',

            'badges'              => 'nullable|string',
            'specs'               => 'nullable|string',

            'is_featured'         => 'nullable|boolean',
            'sort_order'          => 'nullable|integer|min:0',
            'status'              => 'nullable|boolean',

            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery_images'      => 'nullable|array',
            'gallery_images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'name'                => $request->name,
            'slug'                => $request->slug ?: Str::slug($request->name),

            'short_description'   => $request->short_description,
            'description'         => $request->description,

            'thickness'           => $request->thickness,
            'material_type'       => $request->material_type,
            'application'         => $request->application,
            'key_feature'         => $request->key_feature,
            'options'             => $request->options,

            'badges'              => $request->badges,
            'specs'               => $request->specs,

            'is_featured'         => $request->has('is_featured') ? 1 : 0,
            'sort_order'          => $request->sort_order ?? 0,
            'status'              => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('image')) {
            $product
                ->addMediaFromRequest('image')
                ->toMediaCollection('product_image');
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $product
                    ->addMedia($galleryImage)
                    ->toMediaCollection('product_gallery');
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load('category', 'media');

        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $product->load('category', 'media');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'name'                => 'required|string|max:255|unique:products,name,' . $product->id,
            'slug'                => 'nullable|string|max:255|unique:products,slug,' . $product->id,

            'short_description'   => 'nullable|string',
            'description'         => 'nullable|string',

            'thickness'           => 'nullable|string|max:255',
            'material_type'       => 'nullable|string|max:255',
            'application'         => 'nullable|string|max:255',
            'key_feature'         => 'nullable|string|max:255',
            'options'             => 'nullable|string|max:255',

            'badges'              => 'nullable|string',
            'specs'               => 'nullable|string',

            'is_featured'         => 'nullable|boolean',
            'sort_order'          => 'nullable|integer|min:0',
            'status'              => 'nullable|boolean',

            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery_images'      => 'nullable|array',
            'gallery_images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $product->update([
            'product_category_id' => $request->product_category_id,
            'name'                => $request->name,
            'slug'                => $request->slug ?: Str::slug($request->name),

            'short_description'   => $request->short_description,
            'description'         => $request->description,

            'thickness'           => $request->thickness,
            'material_type'       => $request->material_type,
            'application'         => $request->application,
            'key_feature'         => $request->key_feature,
            'options'             => $request->options,

            'badges'              => $request->badges,
            'specs'               => $request->specs,

            'is_featured'         => $request->has('is_featured') ? 1 : 0,
            'sort_order'          => $request->sort_order ?? 0,
            'status'              => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('image')) {
            $product
                ->addMediaFromRequest('image')
                ->toMediaCollection('product_image');
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $product
                    ->addMedia($galleryImage)
                    ->toMediaCollection('product_gallery');
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function deleteGalleryImage(Media $media)
    {
        $media->delete();

        return back()->with('success', 'Gallery image deleted successfully.');
    }
}