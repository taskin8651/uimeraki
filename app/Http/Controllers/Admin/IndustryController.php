<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::with('media')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:industries,slug',
            'description' => 'nullable|string',
            'badge_icon'  => 'nullable|string|max:255',
            'badge_text'  => 'nullable|string|max:255',
            'tags'        => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $industry = Industry::create([
            'title'       => $request->title,
            'slug'        => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'description' => $request->description,
            'badge_icon'  => $request->badge_icon,
            'badge_text'  => $request->badge_text,
            'tags'        => $request->tags,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('image')) {
            $industry
                ->addMediaFromRequest('image')
                ->toMediaCollection('industry_image');
        }

        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry created successfully.');
    }

    public function show(Industry $industry)
    {
        $industry->load('media');

        return view('admin.industries.show', compact('industry'));
    }

    public function edit(Industry $industry)
    {
        $industry->load('media');

        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('industries', 'slug')->ignore($industry->id),
            ],
            'description' => 'nullable|string',
            'badge_icon'  => 'nullable|string|max:255',
            'badge_text'  => 'nullable|string|max:255',
            'tags'        => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $industry->update([
            'title'       => $request->title,
            'slug'        => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'description' => $request->description,
            'badge_icon'  => $request->badge_icon,
            'badge_text'  => $request->badge_text,
            'tags'        => $request->tags,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('image')) {
            $industry
                ->addMediaFromRequest('image')
                ->toMediaCollection('industry_image');
        }

        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();

        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry deleted successfully.');
    }
}