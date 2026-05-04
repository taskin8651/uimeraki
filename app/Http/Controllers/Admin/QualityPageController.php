<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityPage;
use Illuminate\Http\Request;

class QualityPageController extends Controller
{
    public function index()
    {
        $qualityPage = QualityPage::latest()->first();

        if (!$qualityPage) {
            $qualityPage = QualityPage::create([
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

                'status'                => 1,
            ]);
        }

        return view('admin.quality-pages.index', compact('qualityPage'));
    }

    public function create()
    {
        return redirect()->route('admin.quality-pages.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.quality-pages.index');
    }

    public function show(QualityPage $qualityPage)
    {
        return view('admin.quality-pages.show', compact('qualityPage'));
    }

    public function edit(QualityPage $qualityPage)
    {
        return view('admin.quality-pages.edit', compact('qualityPage'));
    }

    public function update(Request $request, QualityPage $qualityPage)
    {
        $request->validate([
            'hero_eyebrow'         => 'nullable|string|max:255',
            'hero_title'           => 'nullable|string|max:255',
            'hero_highlight'       => 'nullable|string|max:255',
            'hero_description'     => 'nullable|string',
            'hero_chips'           => 'nullable|string',

            'hero_kpi_1_value'     => 'nullable|string|max:255',
            'hero_kpi_1_label'     => 'nullable|string|max:255',
            'hero_kpi_2_value'     => 'nullable|string|max:255',
            'hero_kpi_2_label'     => 'nullable|string|max:255',
            'hero_kpi_3_value'     => 'nullable|string|max:255',
            'hero_kpi_3_label'     => 'nullable|string|max:255',

            'snapshot_label'       => 'nullable|string|max:255',
            'snapshot_badge'       => 'nullable|string|max:255',

            'floating_badge_icon'  => 'nullable|string|max:255',
            'floating_badge_title' => 'nullable|string|max:255',
            'floating_badge_text'  => 'nullable|string|max:255',

            'pillar_eyebrow'       => 'nullable|string|max:255',
            'pillar_title'         => 'nullable|string|max:255',
            'pillar_description'   => 'nullable|string',

            'process_eyebrow'      => 'nullable|string|max:255',
            'process_title'        => 'nullable|string|max:255',
            'process_description'  => 'nullable|string',
            'process_note'         => 'nullable|string|max:255',

            'status'               => 'nullable|boolean',
        ]);

        $qualityPage->update([
            'hero_eyebrow'         => $request->hero_eyebrow,
            'hero_title'           => $request->hero_title,
            'hero_highlight'       => $request->hero_highlight,
            'hero_description'     => $request->hero_description,
            'hero_chips'           => $request->hero_chips,

            'hero_kpi_1_value'     => $request->hero_kpi_1_value,
            'hero_kpi_1_label'     => $request->hero_kpi_1_label,
            'hero_kpi_2_value'     => $request->hero_kpi_2_value,
            'hero_kpi_2_label'     => $request->hero_kpi_2_label,
            'hero_kpi_3_value'     => $request->hero_kpi_3_value,
            'hero_kpi_3_label'     => $request->hero_kpi_3_label,

            'snapshot_label'       => $request->snapshot_label,
            'snapshot_badge'       => $request->snapshot_badge,

            'floating_badge_icon'  => $request->floating_badge_icon,
            'floating_badge_title' => $request->floating_badge_title,
            'floating_badge_text'  => $request->floating_badge_text,

            'pillar_eyebrow'       => $request->pillar_eyebrow,
            'pillar_title'         => $request->pillar_title,
            'pillar_description'   => $request->pillar_description,

            'process_eyebrow'      => $request->process_eyebrow,
            'process_title'        => $request->process_title,
            'process_description'  => $request->process_description,
            'process_note'         => $request->process_note,

            'status'               => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.quality-pages.index')
            ->with('success', 'Quality page updated successfully.');
    }

    public function destroy(QualityPage $qualityPage)
    {
        return redirect()
            ->route('admin.quality-pages.index')
            ->with('success', 'Quality page cannot be deleted. You can update it instead.');
    }
}