<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $setting = WebsiteSetting::latest()->first();

        if (!$setting) {
            $setting = WebsiteSetting::create([
                'site_name'          => 'Meraki Foils',
                'site_title'         => 'Meraki Foils',
                'tagline'            => 'High-quality aluminium foils engineered for performance & reliability.',
                'footer_description' => 'High-quality aluminium foils engineered for performance & reliability.',
                'copyright_text'     => '© ' . date('Y') . ' Meraki Foils. All rights reserved.',

                'email'              => 'info@merakifoils.com',
                'phone'              => '+91 79034 90845',
                'address'            => 'Kh no 577 1012/588 1016/586 913/565/1, Khera Nihla, Himachal Pradesh 174101',

                'show_topbar'        => 1,
                'topbar_pills'       => 'Quality, Customization, On-time Delivery, Sustainability',
                'header_button_text' => 'Request a Quote',
                'header_button_link' => url('/#rfq'),

                'newsletter_title'   => 'Newsletter',
                'newsletter_text'    => 'Get product updates & technical notes.',
                'privacy_link'       => '#',
                'terms_link'         => '#',

                'meta_title'         => 'Meraki Foils',
                'meta_description'   => 'High-quality aluminium foils engineered for performance & reliability.',
                'robots'             => 'index, follow',

                'status'             => 1,
            ]);
        }

        return view('admin.website-settings.index', compact('setting'));
    }

    public function update(Request $request, WebsiteSetting $websiteSetting)
    {
        $request->validate([
            'site_name'          => 'nullable|string|max:255',
            'site_title'         => 'nullable|string|max:255',
            'tagline'            => 'nullable|string',
            'footer_description' => 'nullable|string',
            'copyright_text'     => 'nullable|string|max:255',

            'email'              => 'nullable|email|max:255',
            'phone'              => 'nullable|string|max:255',
            'alternate_phone'    => 'nullable|string|max:255',
            'whatsapp_number'    => 'nullable|string|max:255',
            'address'            => 'nullable|string',
            'map_url'            => 'nullable|string',
            'working_hours'      => 'nullable|string|max:255',

            'show_topbar'        => 'nullable|boolean',
            'topbar_pills'       => 'nullable|string',
            'header_button_text' => 'nullable|string|max:255',
            'header_button_link' => 'nullable|string|max:255',

            'newsletter_title'   => 'nullable|string|max:255',
            'newsletter_text'    => 'nullable|string',
            'privacy_link'       => 'nullable|string|max:255',
            'terms_link'         => 'nullable|string|max:255',

            'linkedin_url'       => 'nullable|string|max:255',
            'twitter_url'        => 'nullable|string|max:255',
            'instagram_url'      => 'nullable|string|max:255',
            'facebook_url'       => 'nullable|string|max:255',
            'youtube_url'        => 'nullable|string|max:255',
            'whatsapp_url'       => 'nullable|string|max:255',

            'meta_title'         => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string',
            'meta_keywords'      => 'nullable|string',
            'canonical_url'      => 'nullable|string|max:255',
            'robots'             => 'nullable|string|max:255',
            'og_title'           => 'nullable|string|max:255',
            'og_description'     => 'nullable|string',

            'header_scripts'     => 'nullable|string',
            'footer_scripts'     => 'nullable|string',

            'status'             => 'nullable|boolean',

            'logo'               => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'footer_logo'        => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'favicon'            => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:2048',
            'og_image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'remove_logo'        => 'nullable|boolean',
            'remove_footer_logo' => 'nullable|boolean',
            'remove_favicon'     => 'nullable|boolean',
            'remove_og_image'    => 'nullable|boolean',
        ]);

        $websiteSetting->update([
            'site_name'          => $request->site_name,
            'site_title'         => $request->site_title,
            'tagline'            => $request->tagline,
            'footer_description' => $request->footer_description,
            'copyright_text'     => $request->copyright_text,

            'email'              => $request->email,
            'phone'              => $request->phone,
            'alternate_phone'    => $request->alternate_phone,
            'whatsapp_number'    => $request->whatsapp_number,
            'address'            => $request->address,
            'map_url'            => $request->map_url,
            'working_hours'      => $request->working_hours,

            'show_topbar'        => $request->has('show_topbar') ? 1 : 0,
            'topbar_pills'       => $request->topbar_pills,
            'header_button_text' => $request->header_button_text,
            'header_button_link' => $request->header_button_link,

            'newsletter_title'   => $request->newsletter_title,
            'newsletter_text'    => $request->newsletter_text,
            'privacy_link'       => $request->privacy_link,
            'terms_link'         => $request->terms_link,

            'linkedin_url'       => $request->linkedin_url,
            'twitter_url'        => $request->twitter_url,
            'instagram_url'      => $request->instagram_url,
            'facebook_url'       => $request->facebook_url,
            'youtube_url'        => $request->youtube_url,
            'whatsapp_url'       => $request->whatsapp_url,

            'meta_title'         => $request->meta_title,
            'meta_description'   => $request->meta_description,
            'meta_keywords'      => $request->meta_keywords,
            'canonical_url'      => $request->canonical_url,
            'robots'             => $request->robots,
            'og_title'           => $request->og_title,
            'og_description'     => $request->og_description,

            'header_scripts'     => $request->header_scripts,
            'footer_scripts'     => $request->footer_scripts,

            'status'             => $request->has('status') ? 1 : 0,
        ]);

        if ($request->has('remove_logo')) {
            $websiteSetting->clearMediaCollection('logo');
        }

        if ($request->has('remove_footer_logo')) {
            $websiteSetting->clearMediaCollection('footer_logo');
        }

        if ($request->has('remove_favicon')) {
            $websiteSetting->clearMediaCollection('favicon');
        }

        if ($request->has('remove_og_image')) {
            $websiteSetting->clearMediaCollection('og_image');
        }

        if ($request->hasFile('logo')) {
            $websiteSetting->clearMediaCollection('logo');

            $websiteSetting
                ->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        if ($request->hasFile('footer_logo')) {
            $websiteSetting->clearMediaCollection('footer_logo');

            $websiteSetting
                ->addMediaFromRequest('footer_logo')
                ->toMediaCollection('footer_logo');
        }

        if ($request->hasFile('favicon')) {
            $websiteSetting->clearMediaCollection('favicon');

            $websiteSetting
                ->addMediaFromRequest('favicon')
                ->toMediaCollection('favicon');
        }

        if ($request->hasFile('og_image')) {
            $websiteSetting->clearMediaCollection('og_image');

            $websiteSetting
                ->addMediaFromRequest('og_image')
                ->toMediaCollection('og_image');
        }

        return redirect()
            ->route('admin.website-settings.index')
            ->with('success', 'Website settings updated successfully.');
    }
}