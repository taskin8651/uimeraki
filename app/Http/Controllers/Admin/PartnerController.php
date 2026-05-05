<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'partner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'sort_order'   => 'nullable|integer',
            'status'       => 'nullable|boolean',
        ]);

        $partner = Partner::create([
            'title'      => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('partner_image')) {
            $partner
                ->addMediaFromRequest('partner_image')
                ->toMediaCollection('partner_image');
        }

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'partner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'sort_order'   => 'nullable|integer',
            'status'       => 'nullable|boolean',
            'remove_image'  => 'nullable|boolean',
        ]);

        $partner->update([
            'title'      => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        if ($request->has('remove_image')) {
            $partner->clearMediaCollection('partner_image');
        }

        if ($request->hasFile('partner_image')) {
            $partner->clearMediaCollection('partner_image');

            $partner
                ->addMediaFromRequest('partner_image')
                ->toMediaCollection('partner_image');
        }

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner deleted successfully.');
    }
}