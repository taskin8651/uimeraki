<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CapabilityPage;
use Illuminate\Http\Request;

class CapabilityPageController extends Controller
{
    public function index()
    {
        $capabilityPage = CapabilityPage::with('media')->latest()->first();

        if (!$capabilityPage) {
            $capabilityPage = CapabilityPage::create([
                'hero_eyebrow'       => 'Capabilities',
                'hero_title'         => 'Converting, printing & finishing—',
                'hero_highlight'     => 'built for precision.',
                'hero_description'   => 'From rotogravure printing to coating, lamination, slitting and QA, our capabilities are built to deliver consistent foil performance across demanding applications.',

                'hero_kpi_1_value'   => '6',
                'hero_kpi_1_label'   => 'Print colors',
                'hero_kpi_2_value'   => '±0.2',
                'hero_kpi_2_label'   => 'Slit tolerance',
                'hero_kpi_3_value'   => '2–3',
                'hero_kpi_3_label'   => 'Laminate ply',

                'hero_chips'         => 'HSL / Primers, 50–1200mm widths, Defect logs, Batch traceability',
                'hero_visual_label'  => 'Inline QA',

                'specs_eyebrow'      => 'Technical range',
                'specs_title'        => 'Capability Specifications',
                'specs_description'  => 'A quick view of our core manufacturing and quality capabilities.',
                'specs_button_text'  => 'Request Technical Guidance',
                'specs_button_link'  => '#capx-cta',

                'process_eyebrow'    => 'How we work',
                'process_title'      => 'From requirement to reliable supply.',
                'process_description'=> 'A structured workflow helps us understand your needs, prototype the right structure, produce consistently and deliver on time.',

                'cta_eyebrow'        => 'Request a Quote',
                'cta_title'          => 'Need a capability-matched foil solution?',
                'cta_description'    => 'Share your application, specs and performance targets. Our team will help you select the right process and structure.',
                'cta_points'         => 'Application & industry, Micron / temper / coating, Slit width / core ID / max OD, Print colors & registration',
                'cta_trust_chips'    => '99.5% On-time, cGMP aligned, Recyclability first',
                'cta_button_text'    => 'Submit RFQ',
                'cta_button_link'    => '#rfq',

                'status'             => 1,
            ]);
        }

        return view('admin.capability-pages.index', compact('capabilityPage'));
    }

    public function create()
    {
        return redirect()->route('admin.capability-pages.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.capability-pages.index');
    }

    public function show(CapabilityPage $capabilityPage)
    {
        $capabilityPage->load('media');

        return view('admin.capability-pages.show', compact('capabilityPage'));
    }

    public function edit(CapabilityPage $capabilityPage)
    {
        $capabilityPage->load('media');

        return view('admin.capability-pages.edit', compact('capabilityPage'));
    }

    public function update(Request $request, CapabilityPage $capabilityPage)
    {
        $request->validate([
            'hero_eyebrow'       => 'nullable|string|max:255',
            'hero_title'         => 'nullable|string|max:255',
            'hero_highlight'     => 'nullable|string|max:255',
            'hero_description'   => 'nullable|string',

            'hero_kpi_1_value'   => 'nullable|string|max:255',
            'hero_kpi_1_label'   => 'nullable|string|max:255',
            'hero_kpi_2_value'   => 'nullable|string|max:255',
            'hero_kpi_2_label'   => 'nullable|string|max:255',
            'hero_kpi_3_value'   => 'nullable|string|max:255',
            'hero_kpi_3_label'   => 'nullable|string|max:255',

            'hero_chips'         => 'nullable|string',
            'hero_visual_label'  => 'nullable|string|max:255',

            'specs_eyebrow'      => 'nullable|string|max:255',
            'specs_title'        => 'nullable|string|max:255',
            'specs_description'  => 'nullable|string',
            'specs_button_text'  => 'nullable|string|max:255',
            'specs_button_link'  => 'nullable|string|max:255',

            'process_eyebrow'    => 'nullable|string|max:255',
            'process_title'      => 'nullable|string|max:255',
            'process_description'=> 'nullable|string',

            'cta_eyebrow'        => 'nullable|string|max:255',
            'cta_title'          => 'nullable|string|max:255',
            'cta_description'    => 'nullable|string',
            'cta_points'         => 'nullable|string',
            'cta_trust_chips'    => 'nullable|string',
            'cta_button_text'    => 'nullable|string|max:255',
            'cta_button_link'    => 'nullable|string|max:255',

            'status'             => 'nullable|boolean',

            'hero_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'float_image_1'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'float_image_2'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $capabilityPage->update([
            'hero_eyebrow'        => $request->hero_eyebrow,
            'hero_title'          => $request->hero_title,
            'hero_highlight'      => $request->hero_highlight,
            'hero_description'    => $request->hero_description,

            'hero_kpi_1_value'    => $request->hero_kpi_1_value,
            'hero_kpi_1_label'    => $request->hero_kpi_1_label,
            'hero_kpi_2_value'    => $request->hero_kpi_2_value,
            'hero_kpi_2_label'    => $request->hero_kpi_2_label,
            'hero_kpi_3_value'    => $request->hero_kpi_3_value,
            'hero_kpi_3_label'    => $request->hero_kpi_3_label,

            'hero_chips'          => $request->hero_chips,
            'hero_visual_label'   => $request->hero_visual_label,

            'specs_eyebrow'       => $request->specs_eyebrow,
            'specs_title'         => $request->specs_title,
            'specs_description'   => $request->specs_description,
            'specs_button_text'   => $request->specs_button_text,
            'specs_button_link'   => $request->specs_button_link,

            'process_eyebrow'     => $request->process_eyebrow,
            'process_title'       => $request->process_title,
            'process_description' => $request->process_description,

            'cta_eyebrow'         => $request->cta_eyebrow,
            'cta_title'           => $request->cta_title,
            'cta_description'     => $request->cta_description,
            'cta_points'          => $request->cta_points,
            'cta_trust_chips'     => $request->cta_trust_chips,
            'cta_button_text'     => $request->cta_button_text,
            'cta_button_link'     => $request->cta_button_link,

            'status'              => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('hero_image')) {
            $capabilityPage
                ->addMediaFromRequest('hero_image')
                ->toMediaCollection('capability_hero_image');
        }

        if ($request->hasFile('float_image_1')) {
            $capabilityPage
                ->addMediaFromRequest('float_image_1')
                ->toMediaCollection('capability_float_image_1');
        }

        if ($request->hasFile('float_image_2')) {
            $capabilityPage
                ->addMediaFromRequest('float_image_2')
                ->toMediaCollection('capability_float_image_2');
        }

        return redirect()
            ->route('admin.capability-pages.index')
            ->with('success', 'Capability page updated successfully.');
    }

    public function destroy(CapabilityPage $capabilityPage)
    {
        return redirect()
            ->route('admin.capability-pages.index')
            ->with('success', 'Capability page cannot be deleted. You can update it instead.');
    }
}