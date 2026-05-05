<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;
use App\Models\Capability;
use App\Models\Product;
use App\Models\Industry;
use App\Models\QualityPage;
use App\Models\Resource;

class IndexController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::active()->latest()->first();

         $capabilities = Capability::active()
        ->orderBy('sort_order')
        ->latest()
        ->get();

        $homeProducts = Product::with(['category', 'media'])
        ->active()
        ->featured()
        ->orderBy('sort_order')
        ->latest()
        ->take(2)
        ->get();

         $homeIndustries = Industry::active()
        ->orderBy('sort_order')
        ->latest()
        ->take(4)
        ->get();

        $qualityPage = QualityPage::active()
        ->latest()
        ->first();

        $homeResources = Resource::with(['category', 'media'])
        ->active()
        ->featured()
        ->orderBy('sort_order')
        ->latest()
        ->take(3)
        ->get();


        return view('frontend.index', compact('aboutPage', 'capabilities', 'homeProducts', 'homeIndustries' , 'qualityPage', 'homeResources'));
    }
}
