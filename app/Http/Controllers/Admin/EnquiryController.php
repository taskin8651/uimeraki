<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::latest()->get();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function show(Enquiry $enquiry)
    {
        if ($enquiry->status === 'new') {
            $enquiry->update(['status' => 'read']);
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function updateStatus(Request $request, Enquiry $enquiry)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied,closed',
        ]);

        $enquiry->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Enquiry status updated successfully.');
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();

        return redirect()
            ->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted successfully.');
    }
}