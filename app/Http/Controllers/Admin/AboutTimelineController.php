<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutTimeline;
use Illuminate\Http\Request;

class AboutTimelineController extends Controller
{
    public function index()
    {
        $timelines = AboutTimeline::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.about-timelines.index', compact('timelines'));
    }

    public function create()
    {
        return view('admin.about-timelines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        AboutTimeline::create([
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-timelines.index')
            ->with('success', 'Timeline item created successfully.');
    }

    public function show(AboutTimeline $aboutTimeline)
    {
        return view('admin.about-timelines.show', compact('aboutTimeline'));
    }

    public function edit(AboutTimeline $aboutTimeline)
    {
        return view('admin.about-timelines.edit', compact('aboutTimeline'));
    }

    public function update(Request $request, AboutTimeline $aboutTimeline)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $aboutTimeline->update([
            'title'       => $request->title,
            'description' => $request->description,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-timelines.index')
            ->with('success', 'Timeline item updated successfully.');
    }

    public function destroy(AboutTimeline $aboutTimeline)
    {
        $aboutTimeline->delete();

        return redirect()
            ->route('admin.about-timelines.index')
            ->with('success', 'Timeline item deleted successfully.');
    }
}