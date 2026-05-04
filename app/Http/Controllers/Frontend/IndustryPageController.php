<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\IndustryPage;

class IndustryPageController extends Controller
{
    public function index()
    {
        $industryPage = IndustryPage::with('media')
            ->active()
            ->latest()
            ->first();

        if (!$industryPage) {
            $industryPage = new IndustryPage([
                'hero_eyebrow'        => 'Industries We Serve',
                'hero_title'          => 'Foils tailored for',
                'hero_highlight'      => 'every sector.',
                'hero_description'    => 'Precision-engineered aluminium foils for pharma, food, dairy, cosmetics and confectionery packaging applications.',
                'hero_chips'          => 'Pharma, Food & Dairy, Cosmetics, Confectionery',

                'section_eyebrow'     => 'Applications',
                'section_title'       => 'Industries We Serve',
                'section_description' => 'Diverse markets, one trusted material engineered for performance, barrier and reliability.',
            ]);
        }

        $industries = Industry::with('media')
            ->active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.industries', compact(
            'industryPage',
            'industries'
        ));
    }

    public function show($slug)
    {
        $industry = Industry::with('media')
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedIndustries = Industry::with('media')
            ->active()
            ->where('id', '!=', $industry->id)
            ->orderBy('sort_order')
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.industry-detail', compact(
            'industry',
            'relatedIndustries'
        ));
    }
}