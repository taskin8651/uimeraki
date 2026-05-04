<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CapabilityProcess;
use Illuminate\Http\Request;

class CapabilityProcessController extends Controller
{
    public function index()
    {
        $processes = CapabilityProcess::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.capability-processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.capability-processes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        CapabilityProcess::create([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.capability-processes.index')
            ->with('success', 'Capability process created successfully.');
    }

    public function show(CapabilityProcess $capabilityProcess)
    {
        return view('admin.capability-processes.show', compact('capabilityProcess'));
    }

    public function edit(CapabilityProcess $capabilityProcess)
    {
        return view('admin.capability-processes.edit', compact('capabilityProcess'));
    }

    public function update(Request $request, CapabilityProcess $capabilityProcess)
    {
        $request->validate([
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $capabilityProcess->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.capability-processes.index')
            ->with('success', 'Capability process updated successfully.');
    }

    public function destroy(CapabilityProcess $capabilityProcess)
    {
        $capabilityProcess->delete();

        return redirect()
            ->route('admin.capability-processes.index')
            ->with('success', 'Capability process deleted successfully.');
    }
}