<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualitySnapshot;
use Illuminate\Http\Request;

class QualitySnapshotController extends Controller
{
    public function index()
    {
        $snapshots = QualitySnapshot::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.quality-snapshots.index', compact('snapshots'));
    }

    public function create()
    {
        return view('admin.quality-snapshots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        QualitySnapshot::create([
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.quality-snapshots.index')
            ->with('success', 'QA snapshot created successfully.');
    }

    public function show(QualitySnapshot $qualitySnapshot)
    {
        return view('admin.quality-snapshots.show', compact('qualitySnapshot'));
    }

    public function edit(QualitySnapshot $qualitySnapshot)
    {
        return view('admin.quality-snapshots.edit', compact('qualitySnapshot'));
    }

    public function update(Request $request, QualitySnapshot $qualitySnapshot)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $qualitySnapshot->update([
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.quality-snapshots.index')
            ->with('success', 'QA snapshot updated successfully.');
    }

    public function destroy(QualitySnapshot $qualitySnapshot)
    {
        $qualitySnapshot->delete();

        return redirect()
            ->route('admin.quality-snapshots.index')
            ->with('success', 'QA snapshot deleted successfully.');
    }
}