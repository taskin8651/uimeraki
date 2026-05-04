<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use Illuminate\Http\Request;

class AboutFeatureController extends Controller
{
    public function index()
    {
        $features = AboutFeature::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.about-features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.about-features.create');
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

        AboutFeature::create([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-features.index')
            ->with('success', 'About feature created successfully.');
    }

    public function show(AboutFeature $aboutFeature)
    {
        return view('admin.about-features.show', compact('aboutFeature'));
    }

    public function edit(AboutFeature $aboutFeature)
    {
        return view('admin.about-features.edit', compact('aboutFeature'));
    }

    public function update(Request $request, AboutFeature $aboutFeature)
    {
        $request->validate([
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $aboutFeature->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-features.index')
            ->with('success', 'About feature updated successfully.');
    }

    public function destroy(AboutFeature $aboutFeature)
    {
        $aboutFeature->delete();

        return redirect()
            ->route('admin.about-features.index')
            ->with('success', 'About feature deleted successfully.');
    }
}