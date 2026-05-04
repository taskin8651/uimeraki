<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityPillar;
use Illuminate\Http\Request;

class QualityPillarController extends Controller
{
    public function index()
    {
        $pillars = QualityPillar::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.quality-pillars.index', compact('pillars'));
    }

    public function create()
    {
        return view('admin.quality-pillars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'points'      => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        QualityPillar::create([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'points'      => $request->points,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.quality-pillars.index')
            ->with('success', 'Quality pillar created successfully.');
    }

    public function show(QualityPillar $qualityPillar)
    {
        return view('admin.quality-pillars.show', compact('qualityPillar'));
    }

    public function edit(QualityPillar $qualityPillar)
    {
        return view('admin.quality-pillars.edit', compact('qualityPillar'));
    }

    public function update(Request $request, QualityPillar $qualityPillar)
    {
        $request->validate([
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'points'      => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $qualityPillar->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'points'      => $request->points,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.quality-pillars.index')
            ->with('success', 'Quality pillar updated successfully.');
    }

    public function destroy(QualityPillar $qualityPillar)
    {
        $qualityPillar->delete();

        return redirect()
            ->route('admin.quality-pillars.index')
            ->with('success', 'Quality pillar deleted successfully.');
    }
}