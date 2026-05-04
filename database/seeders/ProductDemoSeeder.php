<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductDemoSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Product Categories
        |--------------------------------------------------------------------------
        */

        $categories = [
            [
                'name'       => 'Pharma',
                'slug'       => 'pharma',
                'icon'       => 'bi bi-capsule-pill',
                'sort_order' => 1,
                'status'     => 1,
            ],
            [
                'name'       => 'Food & Dairy',
                'slug'       => 'food-dairy',
                'icon'       => 'bi bi-basket2',
                'sort_order' => 2,
                'status'     => 1,
            ],
            [
                'name'       => 'Cosmetics',
                'slug'       => 'cosmetics',
                'icon'       => 'bi bi-brush',
                'sort_order' => 3,
                'status'     => 1,
            ],
            [
                'name'       => 'Confectionery',
                'slug'       => 'confectionery',
                'icon'       => 'bi bi-cup-hot',
                'sort_order' => 4,
                'status'     => 1,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        $pharma = ProductCategory::where('slug', 'pharma')->first();
        $food = ProductCategory::where('slug', 'food-dairy')->first();
        $cosmetics = ProductCategory::where('slug', 'cosmetics')->first();
        $confectionery = ProductCategory::where('slug', 'confectionery')->first();

        $products = [
            [
                'product_category_id' => $pharma->id,
                'name'                => 'Blister Foil',
                'slug'                => 'blister-foil',
                'short_description'   => 'Hard aluminium for tablet and capsule blisters with lacquer and print options.',
                'description'         => 'Blister foil is engineered for pharmaceutical packaging where barrier, print registration and sealing consistency are critical.',
                'thickness'           => '20–25µ',
                'material_type'       => 'Hard alu',
                'application'         => 'Tablets & Capsules',
                'key_feature'         => 'Tight register printing',
                'options'             => 'Lacquer, up to 6 colors',
                'badges'              => 'Pharma, Hard alu',
                'specs'               => '20–25µ, PVC/PVDC, Tight register',
                'is_featured'         => 1,
                'sort_order'          => 1,
                'status'              => 1,
            ],
            [
                'product_category_id' => $pharma->id,
                'name'                => 'Strip Foil',
                'slug'                => 'strip-foil',
                'short_description'   => 'Soft aluminium for strip packs requiring high barrier and controlled tear.',
                'description'         => 'Strip foil is designed for pharma strip packaging with clean tear, low MVTR and consistent sealability.',
                'thickness'           => '25–30µ',
                'material_type'       => 'Soft alu',
                'application'         => 'High-barrier strips',
                'key_feature'         => 'Clean controlled tear',
                'options'             => 'Seal window tuning',
                'badges'              => 'Pharma, Soft alu',
                'specs'               => '25–30µ, Sealability window, Clean tear',
                'is_featured'         => 1,
                'sort_order'          => 2,
                'status'              => 1,
            ],
            [
                'product_category_id' => $pharma->id,
                'name'                => 'Custom Pharma Laminates',
                'slug'                => 'custom-pharma-laminates',
                'short_description'   => 'Performance stack-ups by spec for demanding pharmaceutical applications.',
                'description'         => 'Custom laminates combine aluminium foil and films to meet barrier, seal strength and regulatory packaging requirements.',
                'thickness'           => 'As per spec',
                'material_type'       => 'Foil + films',
                'application'         => 'Pharma laminates',
                'key_feature'         => 'Custom barrier performance',
                'options'             => '2–3 ply structures',
                'badges'              => '2–3 ply, Foil + films',
                'specs'               => 'Seal strength, WVTR/OTR, Reports',
                'is_featured'         => 0,
                'sort_order'          => 3,
                'status'              => 1,
            ],
            [
                'product_category_id' => $food->id,
                'name'                => 'Lidding Foil – Yogurt',
                'slug'                => 'lidding-foil-yogurt',
                'short_description'   => 'Peelable lidding foil with consistent seal window for yogurt cups.',
                'description'         => 'Lidding foil for dairy cups is optimized for peelability, seal strength and barrier protection.',
                'thickness'           => 'As per cup spec',
                'material_type'       => 'HSL / Primer coated foil',
                'application'         => 'Yogurt and dairy cups',
                'key_feature'         => 'Clean peel',
                'options'             => 'Custom print, embossing',
                'badges'              => 'HSL, Primer',
                'specs'               => 'Clean peel, Low MVTR, Custom print',
                'is_featured'         => 0,
                'sort_order'          => 1,
                'status'              => 1,
            ],
            [
                'product_category_id' => $food->id,
                'name'                => 'Lidding Foil – Dairy Cups',
                'slug'                => 'lidding-foil-dairy-cups',
                'short_description'   => 'Emboss and print options with reliable barrier performance.',
                'description'         => 'Premium lidding foil for dairy applications with controlled sealing and excellent print appearance.',
                'thickness'           => 'Custom',
                'material_type'       => 'Printed lidding foil',
                'application'         => 'Dairy cups',
                'key_feature'         => 'Emboss and print options',
                'options'             => 'Widths 50–1200mm',
                'badges'              => 'Emboss, Print',
                'specs'               => 'Widths 50–1200mm, Up to 6 colors, Traceability',
                'is_featured'         => 0,
                'sort_order'          => 2,
                'status'              => 1,
            ],
            [
                'product_category_id' => $food->id,
                'name'                => 'Multipurpose Lidding Foil',
                'slug'                => 'multipurpose-lidding-foil',
                'short_description'   => 'Balanced barrier and seal profile for food packaging.',
                'description'         => 'Multipurpose lidding foil supports various cup and container sealing applications.',
                'thickness'           => 'Custom',
                'material_type'       => 'Lidding foil',
                'application'         => 'Food packaging',
                'key_feature'         => 'Balanced seal profile',
                'options'             => 'Roll or die-cut',
                'badges'              => 'Seal, Peel',
                'specs'               => 'HSL/Primer, Custom diameter, Roll or die-cut',
                'is_featured'         => 0,
                'sort_order'          => 3,
                'status'              => 1,
            ],
            [
                'product_category_id' => $cosmetics->id,
                'name'                => 'Cosmetic Sachet Laminates',
                'slug'                => 'cosmetic-sachet-laminates',
                'short_description'   => 'Print and laminate structures for creams, gels and personal care sachets.',
                'description'         => 'Cosmetic sachet laminates are designed for visual impact, barrier and sealing performance.',
                'thickness'           => 'Custom',
                'material_type'       => '2–3 ply laminate',
                'application'         => 'Creams and gels',
                'key_feature'         => 'Premium print finish',
                'options'             => 'Custom widths',
                'badges'              => 'Sachets, Closures',
                'specs'               => '2–3 ply, Up to 6 colors, Custom widths',
                'is_featured'         => 0,
                'sort_order'          => 1,
                'status'              => 1,
            ],
            [
                'product_category_id' => $confectionery->id,
                'name'                => 'Chocolate Wrap Foil',
                'slug'                => 'chocolate-wrap-foil',
                'short_description'   => 'High barrier, formability and print impact for confectionery packaging.',
                'description'         => 'Chocolate wrap foil supports premium appearance, product freshness and excellent wrapping behavior.',
                'thickness'           => 'Custom',
                'material_type'       => 'Foil laminate',
                'application'         => 'Chocolate and confectionery wraps',
                'key_feature'         => 'High barrier and formability',
                'options'             => 'Emboss options',
                'badges'              => 'Wraps, Laminates',
                'specs'               => 'Low MVTR, Tear control, Emboss options',
                'is_featured'         => 0,
                'sort_order'          => 1,
                'status'              => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}