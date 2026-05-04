<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryPage;
use Illuminate\Http\Request;

class IndustryPageController extends Controller
{
    public function index()
    {
        $industryPage = IndustryPage::with('media')->latest()->first();

        if (!$industryPage) {
            $industryPage = IndustryPage::create([
                'hero_eyebrow'        => 'Industries We Serve',
                'hero_title'          => 'Foils tailored for',
                'hero_highlight'      => 'every sector.',
                'hero_description'    => 'Precision-engineered aluminium foils for pharma, food, dairy, cosmetics and confectionery packaging applications.',
                'hero_chips'          => 'Pharma, Food & Dairy, Cosmetics, Confectionery',

                'section_eyebrow'     => 'Applications',
                'section_title'       => 'Industries We Serve',
                'section_description' => 'Diverse markets, one trusted material engineered for performance, barrier and reliability.',

                'status'              => 1,
            ]);
        }

        return view('admin.industry-pages.index', compact('industryPage'));
    }

    public function create()
    {
        return redirect()->route('admin.industry-pages.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.industry-pages.index');
    }

    public function show(IndustryPage $industryPage)
    {
        $industryPage->load('media');

        return view('admin.industry-pages.show', compact('industryPage'));
    }

    public function edit(IndustryPage $industryPage)
    {
        $industryPage->load('media');

        return view('admin.industry-pages.edit', compact('industryPage'));
    }

    public function update(Request $request, IndustryPage $industryPage)
    {
        $request->validate([
            'hero_eyebrow'        => 'nullable|string|max:255',
            'hero_title'          => 'nullable|string|max:255',
            'hero_highlight'      => 'nullable|string|max:255',
            'hero_description'    => 'nullable|string',
            'hero_chips'          => 'nullable|string',

            'section_eyebrow'     => 'nullable|string|max:255',
            'section_title'       => 'nullable|string|max:255',
            'section_description' => 'nullable|string',

            'status'              => 'nullable|boolean',
            'hero_image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $industryPage->update([
            'hero_eyebrow'        => $request->hero_eyebrow,
            'hero_title'          => $request->hero_title,
            'hero_highlight'      => $request->hero_highlight,
            'hero_description'    => $request->hero_description,
            'hero_chips'          => $request->hero_chips,

            'section_eyebrow'     => $request->section_eyebrow,
            'section_title'       => $request->section_title,
            'section_description' => $request->section_description,

            'status'              => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('hero_image')) {
            $industryPage
                ->addMediaFromRequest('hero_image')
                ->toMediaCollection('industry_hero_image');
        }

        return redirect()
            ->route('admin.industry-pages.index')
            ->with('success', 'Industry page updated successfully.');
    }

    public function destroy(IndustryPage $industryPage)
    {
        return redirect()
            ->route('admin.industry-pages.index')
            ->with('success', 'Industry page cannot be deleted. You can update it instead.');
    }
}