@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">
            Manage site information, logo, contact details, SEO, social links and scripts
        </p>
    </div>
</div>

@if(session('success'))
    <div class="alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<form method="POST"
      action="{{ route('admin.website-settings.update', $setting->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- BASIC SITE INFO --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-globe"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Site Info</p>
                    <p class="form-card-subtitle">Main website identity</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Site Name</label>
                    <input type="text"
                           name="site_name"
                           value="{{ old('site_name', $setting->site_name) }}"
                           class="field-input"
                           placeholder="Meraki Foils">
                </div>

                <div class="field-group">
                    <label class="field-label">Site Title</label>
                    <input type="text"
                           name="site_title"
                           value="{{ old('site_title', $setting->site_title) }}"
                           class="field-input"
                           placeholder="Meraki Foils">
                </div>

                <div class="field-group">
                    <label class="field-label">Tagline / Short Description</label>
                    <textarea name="tagline"
                              rows="3"
                              class="field-input"
                              placeholder="High-quality aluminium foils engineered for performance & reliability.">{{ old('tagline', $setting->tagline) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Footer Description</label>
                    <textarea name="footer_description"
                              rows="3"
                              class="field-input">{{ old('footer_description', $setting->footer_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Copyright Text</label>
                    <input type="text"
                           name="copyright_text"
                           value="{{ old('copyright_text', $setting->copyright_text) }}"
                           class="field-input"
                           placeholder="© 2026 Meraki Foils. All rights reserved.">
                </div>

            </div>
        </div>

        {{-- LOGOS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Logo & Media</p>
                    <p class="form-card-subtitle">Logo, footer logo, favicon and OG image</p>
                </div>
            </div>

            <div class="form-card-body">

                {{-- LOGO --}}
                <div class="field-group">
                    <label class="field-label">Main Logo</label>

                    @if($setting->getFirstMediaUrl('logo'))
                        <div class="mb-2">
                            <img src="{{ $setting->logo_url }}"
                                 alt="Logo"
                                 style="height:58px;max-width:180px;object-fit:contain;border:1px solid #E2E8F0;border-radius:10px;padding:8px;background:#fff;">
                        </div>

                        <label class="role-checkbox-item" style="max-width:220px;">
                            <input type="checkbox" name="remove_logo" value="1" class="role-checkbox">
                            <div class="check-icon"></div>
                            <span class="checkbox-text">Remove Logo</span>
                        </label>
                    @endif

                    <input type="file" name="logo" class="field-input mt-2" accept="image/*">
                </div>

                {{-- FOOTER LOGO --}}
                <div class="field-group">
                    <label class="field-label">Footer Logo</label>

                    @if($setting->getFirstMediaUrl('footer_logo'))
                        <div class="mb-2">
                            <img src="{{ $setting->footer_logo_url }}"
                                 alt="Footer Logo"
                                 style="height:58px;max-width:180px;object-fit:contain;border:1px solid #E2E8F0;border-radius:10px;padding:8px;background:#fff;">
                        </div>

                        <label class="role-checkbox-item" style="max-width:240px;">
                            <input type="checkbox" name="remove_footer_logo" value="1" class="role-checkbox">
                            <div class="check-icon"></div>
                            <span class="checkbox-text">Remove Footer Logo</span>
                        </label>
                    @endif

                    <input type="file" name="footer_logo" class="field-input mt-2" accept="image/*">
                </div>

                {{-- FAVICON --}}
                <div class="field-group">
                    <label class="field-label">Favicon</label>

                    @if($setting->getFirstMediaUrl('favicon'))
                        <div class="mb-2">
                            <img src="{{ $setting->favicon_url }}"
                                 alt="Favicon"
                                 style="height:42px;width:42px;object-fit:contain;border:1px solid #E2E8F0;border-radius:10px;padding:6px;background:#fff;">
                        </div>

                        <label class="role-checkbox-item" style="max-width:220px;">
                            <input type="checkbox" name="remove_favicon" value="1" class="role-checkbox">
                            <div class="check-icon"></div>
                            <span class="checkbox-text">Remove Favicon</span>
                        </label>
                    @endif

                    <input type="file" name="favicon" class="field-input mt-2" accept="image/*,.ico">
                </div>

                {{-- OG IMAGE --}}
                <div class="field-group">
                    <label class="field-label">OG Image</label>

                    @if($setting->getFirstMediaUrl('og_image'))
                        <div class="mb-2">
                            <img src="{{ $setting->og_image_url }}"
                                 alt="OG Image"
                                 style="width:180px;height:95px;object-fit:cover;border:1px solid #E2E8F0;border-radius:10px;background:#fff;">
                        </div>

                        <label class="role-checkbox-item" style="max-width:220px;">
                            <input type="checkbox" name="remove_og_image" value="1" class="role-checkbox">
                            <div class="check-icon"></div>
                            <span class="checkbox-text">Remove OG Image</span>
                        </label>
                    @endif

                    <input type="file" name="og_image" class="field-input mt-2" accept="image/*">
                </div>

            </div>
        </div>

    </div>

    <div class="admin-form-grid mt-3">

        {{-- CONTACT INFORMATION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-address-book"></i>
                </div>

                <div>
                    <p class="form-card-title">Contact Information</p>
                    <p class="form-card-subtitle">Email, phone, address and map URL</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Email</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email"
                               name="email"
                               value="{{ old('email', $setting->email) }}"
                               class="field-input"
                               placeholder="info@merakifoils.com">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Phone</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>
                        <input type="text"
                               name="phone"
                               value="{{ old('phone', $setting->phone) }}"
                               class="field-input"
                               placeholder="+91 79034 90845">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Alternate Phone</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-phone-alt icon"></i>
                        <input type="text"
                               name="alternate_phone"
                               value="{{ old('alternate_phone', $setting->alternate_phone) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">WhatsApp Number</label>
                    <div class="input-icon-wrap">
                        <i class="fab fa-whatsapp icon"></i>
                        <input type="text"
                               name="whatsapp_number"
                               value="{{ old('whatsapp_number', $setting->whatsapp_number) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Address</label>
                    <textarea name="address"
                              rows="4"
                              class="field-input">{{ old('address', $setting->address) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Map URL</label>
                    <textarea name="map_url"
                              rows="3"
                              class="field-input"
                              placeholder="Google map embed URL or normal map link">{{ old('map_url', $setting->map_url) }}</textarea>
                    <p class="field-hint">Isme Google Map embed URL ya normal map link dono daal sakte ho.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Working Hours</label>
                    <input type="text"
                           name="working_hours"
                           value="{{ old('working_hours', $setting->working_hours) }}"
                           class="field-input"
                           placeholder="Mon - Sat, 10:00 AM - 6:00 PM">
                </div>

            </div>
        </div>

        {{-- HEADER TOPBAR --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bars"></i>
                </div>

                <div>
                    <p class="form-card-title">Header / Topbar</p>
                    <p class="form-card-subtitle">Topbar pills and header button</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="form-info-box mb-3">
                    <p class="meta-label">Topbar Visibility</p>

                    <label class="role-checkbox-item {{ old('show_topbar', $setting->show_topbar) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="show_topbar"
                               value="1"
                               class="role-checkbox"
                               {{ old('show_topbar', $setting->show_topbar) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Show Topbar</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">Topbar Pills</label>
                    <textarea name="topbar_pills"
                              rows="3"
                              class="field-input"
                              placeholder="Quality, Customization, On-time Delivery, Sustainability">{{ old('topbar_pills', $setting->topbar_pills) }}</textarea>
                    <p class="field-hint">Comma separated values.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Header Button Text</label>
                    <input type="text"
                           name="header_button_text"
                           value="{{ old('header_button_text', $setting->header_button_text) }}"
                           class="field-input"
                           placeholder="Request a Quote">
                </div>

                <div class="field-group">
                    <label class="field-label">Header Button Link</label>
                    <input type="text"
                           name="header_button_link"
                           value="{{ old('header_button_link', $setting->header_button_link) }}"
                           class="field-input"
                           placeholder="/#rfq">
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Website Status</p>

                    <label class="role-checkbox-item {{ old('status', $setting->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $setting->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Website Setting</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="admin-form-grid mt-3">

        {{-- FOOTER --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-shoe-prints"></i>
                </div>

                <div>
                    <p class="form-card-title">Footer Settings</p>
                    <p class="form-card-subtitle">Newsletter and legal links</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Newsletter Title</label>
                    <input type="text"
                           name="newsletter_title"
                           value="{{ old('newsletter_title', $setting->newsletter_title) }}"
                           class="field-input"
                           placeholder="Newsletter">
                </div>

                <div class="field-group">
                    <label class="field-label">Newsletter Text</label>
                    <textarea name="newsletter_text"
                              rows="3"
                              class="field-input">{{ old('newsletter_text', $setting->newsletter_text) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Privacy Link</label>
                    <input type="text"
                           name="privacy_link"
                           value="{{ old('privacy_link', $setting->privacy_link) }}"
                           class="field-input"
                           placeholder="/privacy-policy">
                </div>

                <div class="field-group">
                    <label class="field-label">Terms Link</label>
                    <input type="text"
                           name="terms_link"
                           value="{{ old('terms_link', $setting->terms_link) }}"
                           class="field-input"
                           placeholder="/terms">
                </div>

            </div>
        </div>

        {{-- SOCIAL LINKS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-share-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Social Links</p>
                    <p class="form-card-subtitle">Footer and contact social URLs</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" value="{{ old('linkedin_url', $setting->linkedin_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Twitter / X URL</label>
                    <input type="text" name="twitter_url" value="{{ old('twitter_url', $setting->twitter_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Instagram URL</label>
                    <input type="text" name="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Facebook URL</label>
                    <input type="text" name="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">YouTube URL</label>
                    <input type="text" name="youtube_url" value="{{ old('youtube_url', $setting->youtube_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">WhatsApp URL</label>
                    <input type="text" name="whatsapp_url" value="{{ old('whatsapp_url', $setting->whatsapp_url) }}" class="field-input">
                </div>

            </div>
        </div>

    </div>

    <div class="admin-form-grid mt-3">

        {{-- SEO --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-search"></i>
                </div>

                <div>
                    <p class="form-card-title">SEO Settings</p>
                    <p class="form-card-subtitle">Default meta tags and open graph content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Meta Title</label>
                    <input type="text"
                           name="meta_title"
                           value="{{ old('meta_title', $setting->meta_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="field-input">{{ old('meta_description', $setting->meta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="field-input">{{ old('meta_keywords', $setting->meta_keywords) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Canonical URL</label>
                    <input type="text"
                           name="canonical_url"
                           value="{{ old('canonical_url', $setting->canonical_url) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Robots</label>
                    <input type="text"
                           name="robots"
                           value="{{ old('robots', $setting->robots) }}"
                           class="field-input"
                           placeholder="index, follow">
                </div>

                <div class="field-group">
                    <label class="field-label">OG Title</label>
                    <input type="text"
                           name="og_title"
                           value="{{ old('og_title', $setting->og_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">OG Description</label>
                    <textarea name="og_description" rows="3" class="field-input">{{ old('og_description', $setting->og_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- SCRIPTS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-code"></i>
                </div>

                <div>
                    <p class="form-card-title">Scripts</p>
                    <p class="form-card-subtitle">Header and footer tracking scripts</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Header Scripts</label>
                    <textarea name="header_scripts"
                              rows="8"
                              class="field-input"
                              placeholder="Google Analytics, Search Console meta, Pixel code...">{{ old('header_scripts', $setting->header_scripts) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Footer Scripts</label>
                    <textarea name="footer_scripts"
                              rows="8"
                              class="field-input"
                              placeholder="Footer JS scripts...">{{ old('footer_scripts', $setting->footer_scripts) }}</textarea>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Settings
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection