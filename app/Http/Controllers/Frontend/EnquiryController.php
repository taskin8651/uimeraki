<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Models\Faq;

class EnquiryController extends Controller
{
    public function index()
    {
        
        $faqs = Faq::active()
            ->orderBy('sort_order')
            ->latest()
            ->get();
        return view('frontend.contact', compact('faqs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'                   => 'required|string|max:255',
            'company'                => 'nullable|string|max:255',
            'email'                  => 'required|email|max:255',
            'phone'                  => 'nullable|string|max:255',
            'industry'               => 'nullable|string|max:255',
            'enquiry_type'           => 'nullable|string|max:255',
            'message'                => 'nullable|string',
            'target_lead_time'       => 'nullable|string|max:255',
            'expected_annual_volume' => 'nullable|string|max:255',
            'nda_required'           => 'nullable|boolean',
        ]);

        Enquiry::create([
            'name'                   => $request->name,
            'company'                => $request->company,
            'email'                  => $request->email,
            'phone'                  => $request->phone,
            'industry'               => $request->industry,
            'enquiry_type'           => $request->enquiry_type,
            'message'                => $request->message,
            'target_lead_time'       => $request->target_lead_time,
            'expected_annual_volume' => $request->expected_annual_volume,
            'nda_required'           => $request->has('nda_required') ? 1 : 0,
            'status'                 => 'new',
        ]);

        return back()->with('success', 'Your enquiry has been submitted successfully.');
    }
}