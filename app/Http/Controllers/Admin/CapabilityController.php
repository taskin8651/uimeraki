<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capability;
use Illuminate\Http\Request;

class CapabilityController extends Controller
{
    public function index()
    {
        $capabilities = Capability::with('media')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.capabilities.index', compact('capabilities'));
    }

    public function create()
    {
        return view('admin.capabilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'badge_icon'  => 'nullable|string|max:255',
            'badge_text'  => 'nullable|string|max:255',
            'tags'        => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $capability = Capability::create([
            'title'       => $request->title,
            'description' => $request->description,
            'badge_icon'  => $request->badge_icon,
            'badge_text'  => $request->badge_text,
            'tags'        => $request->tags,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('image')) {
            $capability
                ->addMediaFromRequest('image')
                ->toMediaCollection('capability_image');
        }

        return redirect()
            ->route('admin.capabilities.index')
            ->with('success', 'Capability created successfully.');
    }

    public function show(Capability $capability)
    {
        $capability->load('media');

        return view('admin.capabilities.show', compact('capability'));
    }

    public function edit(Capability $capability)
    {
        $capability->load('media');

        return view('admin.capabilities.edit', compact('capability'));
    }

    public function update(Request $request, Capability $capability)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'badge_icon'  => 'nullable|string|max:255',
            'badge_text'  => 'nullable|string|max:255',
            'tags'        => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $capability->update([
            'title'       => $request->title,
            'description' => $request->description,
            'badge_icon'  => $request->badge_icon,
            'badge_text'  => $request->badge_text,
            'tags'        => $request->tags,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('image')) {
            $capability
                ->addMediaFromRequest('image')
                ->toMediaCollection('capability_image');
        }

        return redirect()
            ->route('admin.capabilities.index')
            ->with('success', 'Capability updated successfully.');
    }

    public function destroy(Capability $capability)
    {
        $capability->delete();

        return redirect()
            ->route('admin.capabilities.index')
            ->with('success', 'Capability deleted successfully.');
    }
}