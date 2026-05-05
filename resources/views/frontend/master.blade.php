@php
    $setting = \App\Models\WebsiteSetting::first();

    $siteName = $setting->site_name ?? 'Meraki Foils';
    $siteTitle = $setting->site_title ?? $siteName;
    $metaTitle = $setting->meta_title ?? $siteTitle;
    $metaDescription = $setting->meta_description ?? ($setting->tagline ?? 'High-quality aluminium foils engineered for performance & reliability.');
    $metaKeywords = $setting->meta_keywords ?? '';
    $robots = $setting->robots ?? 'index, follow';

    $email = $setting->email ?? 'info@merakifoils.com';
    $phone = $setting->phone ?? '+91 79034 90845';
    $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);

    $logo = $setting && method_exists($setting, 'getFirstMediaUrl')
        ? ($setting->getFirstMediaUrl('logo') ?: asset('assets/img/logo.png'))
        : asset('assets/img/logo.png');

    $favicon = $setting && method_exists($setting, 'getFirstMediaUrl')
        ? ($setting->getFirstMediaUrl('favicon') ?: asset('assets/img/favicon.png'))
        : asset('assets/img/favicon.png');

    $ogImage = $setting && method_exists($setting, 'getFirstMediaUrl')
        ? ($setting->getFirstMediaUrl('og_image') ?: $logo)
        : $logo;

    $topbarPills = [];
    if (!empty($setting->topbar_pills)) {
        $topbarPills = array_filter(array_map('trim', explode(',', $setting->topbar_pills)));
    }

    if (!count($topbarPills)) {
        $topbarPills = ['Quality', 'Customization', 'On-time Delivery', 'Sustainability'];
    }

    $showTopbar = $setting->show_topbar ?? true;

    $headerButtonText = $setting->header_button_text ?? 'Request a Quote';
    $headerButtonLink = $setting->header_button_link ?? url('/#rfq');

    $currentRoute = request()->route()?->getName();
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title', $metaTitle)</title>

    <meta name="description" content="@yield('meta_description', $metaDescription)" />
    <meta name="keywords" content="@yield('meta_keywords', $metaKeywords)" />
    <meta name="robots" content="{{ $robots }}" />
    <meta name="theme-color" content="#0f172a" />

    <meta property="og:title" content="@yield('og_title', $setting->og_title ?? $metaTitle)" />
    <meta property="og:description" content="@yield('og_description', $setting->og_description ?? $metaDescription)" />
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:type" content="website" />

    @if(!empty($setting->canonical_url))
        <link rel="canonical" href="{{ $setting->canonical_url }}">
    @endif

    <link rel="icon" href="{{ $favicon }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    {!! $setting->header_scripts ?? '' !!}
</head>

<body class="@yield('body_class', 'prdx-page')">

@if($showTopbar)
    <div class="topbar glassy-topbar small text-white">
        <div class="container d-flex align-items-center justify-content-between py-1">

            <div class="d-flex gap-2 overflow-auto small-hide-scroll align-items-center">
                @foreach($topbarPills as $pill)
                    <span class="pill glow {{ $loop->iteration > 3 ? 'd-none d-md-inline' : '' }}">
                        {{ $pill }}
                    </span>
                @endforeach
            </div>

            <div class="d-flex align-items-center gap-3">
                @if($email)
                    <a class="top-action d-flex align-items-center gap-1" href="mailto:{{ $email }}">
                        <i class="bi bi-envelope-fill text-gradient"></i>
                        <span class="d-none d-sm-inline">{{ $email }}</span>
                    </a>
                @endif

                @if($phone)
                    <a class="top-action d-flex align-items-center gap-1" href="tel:{{ $cleanPhone }}">
                        <i class="bi bi-telephone-fill text-gradient"></i>
                        <span class="d-none d-sm-inline">{{ $phone }}</span>
                    </a>
                @endif

                @if($headerButtonText && $headerButtonLink)
                    <a class="btn btn-sm btn-gradient text-dark fw-semibold rounded-pill px-3 d-none d-md-inline shadow-sm"
                       href="{{ $headerButtonLink }}">
                        RFQ
                    </a>
                @endif
            </div>

        </div>
    </div>
@endif

<header class="main-header sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ $logo }}" alt="{{ $siteName }}" height="60" class="me-2">
            </a>

            <button class="navbar-toggler border-0 shadow-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNav"
                    aria-controls="mainNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                           href="{{ route('about') }}">
                            Company
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('capabilities') ? 'active' : '' }}"
                           href="{{ route('capabilities') }}">
                            Capabilities
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.index') || request()->routeIs('products.*') ? 'active' : '' }}"
                           href="{{ route('products.index') }}">
                            Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('industries.index') || request()->routeIs('industries.*') ? 'active' : '' }}"
                           href="{{ route('industries.index') }}">
                            Industries
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('quality') ? 'active' : '' }}"
                           href="{{ route('quality') }}">
                            Quality
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('resources') || request()->routeIs('resources.*') ? 'active' : '' }}"
                           href="{{ route('resources') }}">
                            Resources
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                           href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>

                </ul>

                @if($headerButtonText && $headerButtonLink)
                    <a class="btn btn-gradient rounded-pill px-4 fw-semibold shadow-sm d-none d-md-inline-block"
                       href="{{ $headerButtonLink }}">
                        {{ $headerButtonText }}
                    </a>
                @endif
            </div>

        </div>
    </nav>
</header>

<main>


    @yield('content')


    
</main>

@php
    $setting = $setting ?? \App\Models\WebsiteSetting::first();

    $siteName = $setting->site_name ?? 'Meraki Foils';

    $footerLogo = $setting && method_exists($setting, 'getFirstMediaUrl')
        ? ($setting->getFirstMediaUrl('footer_logo') ?: ($setting->getFirstMediaUrl('logo') ?: asset('assets/img/logo.png')))
        : asset('assets/img/logo.png');

    $footerDescription = $setting->footer_description
        ?? $setting->tagline
        ?? 'High-quality aluminium foils engineered for performance & reliability.';

    $email = $setting->email ?? 'info@merakifoils.com';
    $phone = $setting->phone ?? '+91 79034 90845';
    $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);

    $address = $setting->address ?? 'Kh no 577 1012/588 1016/586 913/565/1, Khera Nihla, Himachal Pradesh 174101';

    $newsletterTitle = $setting->newsletter_title ?? 'Newsletter';
    $newsletterText = $setting->newsletter_text ?? 'Get product updates & technical notes.';

    $copyrightText = $setting->copyright_text
        ?? '© ' . date('Y') . ' ' . $siteName . '. All rights reserved.';

    $privacyLink = $setting->privacy_link ?: url('/privacy-policy');
    $termsLink = $setting->terms_link ?: url('/terms');

    $linkedinUrl = $setting->linkedin_url ?? null;
    $twitterUrl = $setting->twitter_url ?? null;
    $instagramUrl = $setting->instagram_url ?? null;
    $facebookUrl = $setting->facebook_url ?? null;
    $youtubeUrl = $setting->youtube_url ?? null;
    $whatsappUrl = $setting->whatsapp_url ?? null;
@endphp

<footer class="mf-footer">
    <div class="mf-footer-strip"></div>

    <div class="container position-relative">
        <span class="mf-footer-glow mf-footer-glow-1 d-none d-md-block"></span>
        <span class="mf-footer-glow mf-footer-glow-2 d-none d-md-block"></span>

        <div class="row g-4 g-lg-5 align-items-start">

            <div class="col-md-5">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <a href="{{ url('/') }}" class="mf-footer-logo">
                        <img src="{{ $footerLogo }}"
                             alt="{{ $siteName }}"
                             height="38"
                             class="mf-footer-logo">
                    </a>
                </div>

                @if($footerDescription)
                    <p class="mf-footer-text mb-3">
                        {{ $footerDescription }}
                    </p>
                @endif

                <div class="mf-footer-meta">

                    @if($address)
                        <div class="mf-footer-meta-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>{{ $address }}</span>
                        </div>
                    @endif

                    @if($email)
                        <div class="mf-footer-meta-item">
                            <i class="bi bi-envelope-fill"></i>
                            <a href="mailto:{{ $email }}">
                                {{ $email }}
                            </a>
                        </div>
                    @endif

                    @if($phone)
                        <div class="mf-footer-meta-item">
                            <i class="bi bi-telephone-fill"></i>
                            <a href="tel:{{ $cleanPhone }}">
                                {{ $phone }}
                            </a>
                        </div>
                    @endif

                </div>

                @if($linkedinUrl || $twitterUrl || $instagramUrl || $facebookUrl || $youtubeUrl || $whatsappUrl)
                    <div class="d-flex gap-2 mt-3">

                        @if($linkedinUrl)
                            <a href="{{ $linkedinUrl }}"
                               target="_blank"
                               rel="noopener"
                               class="mf-footer-social"
                               aria-label="LinkedIn">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        @endif

                        @if($twitterUrl)
                            <a href="{{ $twitterUrl }}"
                               target="_blank"
                               rel="noopener"
                               class="mf-footer-social"
                               aria-label="Twitter/X">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                        @endif

                        @if($instagramUrl)
                            <a href="{{ $instagramUrl }}"
                               target="_blank"
                               rel="noopener"
                               class="mf-footer-social"
                               aria-label="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                        @endif

                        @if($facebookUrl)
                            <a href="{{ $facebookUrl }}"
                               target="_blank"
                               rel="noopener"
                               class="mf-footer-social"
                               aria-label="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                        @endif

                        @if($youtubeUrl)
                            <a href="{{ $youtubeUrl }}"
                               target="_blank"
                               rel="noopener"
                               class="mf-footer-social"
                               aria-label="YouTube">
                                <i class="bi bi-youtube"></i>
                            </a>
                        @endif

                        @if($whatsappUrl)
                            <a href="{{ $whatsappUrl }}"
                               target="_blank"
                               rel="noopener"
                               class="mf-footer-social"
                               aria-label="WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        @endif

                    </div>
                @endif
            </div>

            <div class="col-6 col-md-2">
                <h6 class="mf-footer-head">Explore</h6>

                <ul class="mf-footer-links">
                    <li>
                        <a href="{{ route('products.index') }}">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('industries.index') }}">
                            Industries
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('quality') }}">
                            Quality
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('resources') }}">
                            Resources
                        </a>
                    </li>

                  
                </ul>
            </div>

            <div class="col-6 col-md-2">
                <h6 class="mf-footer-head">Company</h6>

                <ul class="mf-footer-links">
                    <li>
                        <a href="{{ route('about') }}">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('capabilities') }}">
                            Capabilities
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/#rfq') }}">
                            Request a Quote
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6 class="mf-footer-head">
                    {{ $newsletterTitle }}
                </h6>

                @if($newsletterText)
                    <p class="mf-footer-note">
                        {{ $newsletterText }}
                    </p>
                @endif

                <form class="mf-footer-newsletter" onsubmit="event.preventDefault()">
                    <input type="email"
                           class="mf-footer-input"
                           placeholder="Email address"
                           required>

                    <button class="mf-footer-btn" type="submit">
                        Join
                    </button>
                </form>

                <p class="mf-footer-micro mb-0 mt-2">
                    We respect your privacy.
                </p>
            </div>
        </div>

        <hr class="mf-footer-hr">

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="mf-footer-micro">
                {{ $copyrightText }}
            </div>

            <div class="d-flex gap-3">
                <a href="{{ $privacyLink }}" class="mf-footer-minilink">
                    Privacy
                </a>

                <a href="{{ $termsLink }}" class="mf-footer-minilink">
                    Terms
                </a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

{!! $setting->footer_scripts ?? '' !!}

</body>
</html>