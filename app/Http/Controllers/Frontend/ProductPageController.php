<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductPageController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with(['category', 'media'])
            ->active()
            ->featured()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $categories = ProductCategory::with([
                'activeProducts' => function ($query) {
                    $query->with('media')
                        ->orderBy('sort_order')
                        ->latest();
                }
            ])
            ->where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $compareProducts = Product::with(['category'])
            ->active()
            ->whereIn('slug', ['blister-foil', 'strip-foil'])
            ->orderBy('sort_order')
            ->get();

        return view('frontend.products', compact(
            'featuredProducts',
            'categories',
            'compareProducts'
        ));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'media'])
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::with(['category', 'media'])
            ->active()
            ->where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('sort_order')
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }
}