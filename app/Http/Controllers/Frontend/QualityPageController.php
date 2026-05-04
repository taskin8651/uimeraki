<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\QualityPage;
use App\Models\QualityPillar;
use App\Models\QualityProcess;
use App\Models\QualitySnapshot;

class QualityPageController extends Controller
{
    public function index()
    {
        $qualityPage = QualityPage::active()
            ->latest()
            ->first();

        if (!$qualityPage) {
            $qualityPage = new QualityPage([
                'hero_eyebrow'          => 'Quality & Compliance',
                'hero_title'            => 'Controlled processes.',
                'hero_highlight'        => 'results.',
                'hero_description'      => 'From incoming coils to finished rolls, every metre is traceable, tested, and released under defined quality plans.',
                'hero_chips'            => 'Batch traceability, In-process QA, Certificates on request',

                'hero_kpi_1_value'      => '99.5%',
                'hero_kpi_1_label'      => 'On-time',
                'hero_kpi_2_value'      => '250+',
                'hero_kpi_2_label'      => 'Active SKUs',
                'hero_kpi_3_value'      => '4',
                'hero_kpi_3_label'      => 'Core industries',

                'snapshot_label'        => 'QA Snapshot',
                'snapshot_badge'        => 'Pharma-grade focus',

                'floating_badge_icon'   => 'bi bi-shield-lock',
                'floating_badge_title'  => 'Documented SOPs',
                'floating_badge_text'   => 'Aligned with cGMP expectations.',

                'pillar_eyebrow'        => 'Quality system',
                'pillar_title'          => 'How we keep every roll consistent',
                'pillar_description'    => 'Defined checks at each stage — backed by data, documentation, and training.',

                'process_eyebrow'       => 'From coil to carton',
                'process_title'         => 'Quality at every step',
                'process_description'   => 'A simple four-step view of how specs become qualified product at your line.',
                'process_note'          => 'Steps can be customized per customer SOP.',
            ]);
        }

        $snapshots = QualitySnapshot::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $pillars = QualityPillar::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $processes = QualityProcess::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.quality', compact(
            'qualityPage',
            'snapshots',
            'pillars',
            'processes'
        ));
    }
}