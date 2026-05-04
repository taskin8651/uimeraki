<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CapabilitySpec;
use Illuminate\Http\Request;

class CapabilitySpecController extends Controller
{
    public function index()
    {
        $specs = CapabilitySpec::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.capability-specs.index', compact('specs'));
    }

    public function create()
    {
        return view('admin.capability-specs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'         => 'nullable|string|max:255',
            'process'      => 'required|string|max:255',
            'range_detail' => 'nullable|string',
            'notes'        => 'nullable|string',
            'sort_order'   => 'nullable|integer|min:0',
            'status'       => 'nullable|boolean',
        ]);

        CapabilitySpec::create([
            'icon'         => $request->icon,
            'process'      => $request->process,
            'range_detail' => $request->range_detail,
            'notes'        => $request->notes,
            'sort_order'   => $request->sort_order ?? 0,
            'status'       => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.capability-specs.index')
            ->with('success', 'Capability spec created successfully.');
    }

    public function show(CapabilitySpec $capabilitySpec)
    {
        return view('admin.capability-specs.show', compact('capabilitySpec'));
    }

    public function edit(CapabilitySpec $capabilitySpec)
    {
        return view('admin.capability-specs.edit', compact('capabilitySpec'));
    }

    public function update(Request $request, CapabilitySpec $capabilitySpec)
    {
        $request->validate([
            'icon'         => 'nullable|string|max:255',
            'process'      => 'required|string|max:255',
            'range_detail' => 'nullable|string',
            'notes'        => 'nullable|string',
            'sort_order'   => 'nullable|integer|min:0',
            'status'       => 'nullable|boolean',
        ]);

        $capabilitySpec->update([
            'icon'         => $request->icon,
            'process'      => $request->process,
            'range_detail' => $request->range_detail,
            'notes'        => $request->notes,
            'sort_order'   => $request->sort_order ?? 0,
            'status'       => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.capability-specs.index')
            ->with('success', 'Capability spec updated successfully.');
    }

    public function destroy(CapabilitySpec $capabilitySpec)
    {
        $capabilitySpec->delete();

        return redirect()
            ->route('admin.capability-specs.index')
            ->with('success', 'Capability spec deleted successfully.');
    }
}