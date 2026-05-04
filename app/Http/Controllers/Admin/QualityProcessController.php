<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityProcess;
use Illuminate\Http\Request;

class QualityProcessController extends Controller
{
    public function index()
    {
        $processes = QualityProcess::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.quality-processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.quality-processes.create');
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

        QualityProcess::create([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'points'      => $request->points,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.quality-processes.index')
            ->with('success', 'Quality process step created successfully.');
    }

    public function show(QualityProcess $qualityProcess)
    {
        return view('admin.quality-processes.show', compact('qualityProcess'));
    }

    public function edit(QualityProcess $qualityProcess)
    {
        return view('admin.quality-processes.edit', compact('qualityProcess'));
    }

    public function update(Request $request, QualityProcess $qualityProcess)
    {
        $request->validate([
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'points'      => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $qualityProcess->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'points'      => $request->points,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.quality-processes.index')
            ->with('success', 'Quality process step updated successfully.');
    }

    public function destroy(QualityProcess $qualityProcess)
    {
        $qualityProcess->delete();

        return redirect()
            ->route('admin.quality-processes.index')
            ->with('success', 'Quality process step deleted successfully.');
    }
}