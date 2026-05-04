<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Capability;
use App\Models\CapabilityPage;
use App\Models\CapabilityProcess;
use App\Models\CapabilitySpec;

class CapabilityPageController extends Controller
{
    public function index()
    {
        $capabilityPage = CapabilityPage::with('media')
            ->active()
            ->latest()
            ->first();

        if (!$capabilityPage) {
            $capabilityPage = new CapabilityPage([
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
            ]);
        }

        $capabilities = Capability::with('media')
            ->active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $specs = CapabilitySpec::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $processes = CapabilityProcess::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.capabilities', compact(
            'capabilityPage',
            'capabilities',
            'specs',
            'processes'
        ));
    }
}