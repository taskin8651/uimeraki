@extends('frontend.master')

@section('title', 'About — Meraki Foils')

@section('content')

<!-- ============= About Hero ============= -->
<section class="ma-hero position-relative overflow-hidden">
    <span class="ma-hero-glow-1 d-none d-md-block"></span>
    <span class="ma-hero-glow-2 d-none d-lg-block"></span>

    <div class="container position-relative">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="ma-hero-breadcrumb small fw-semibold text-uppercase mb-2 d-flex align-items-center gap-2">
                    <span>
                        <i class="bi bi-house-door"></i> Home
                    </span>
                    <span class="ma-hero-sep"></span>
                    <span class="text-body-secondary">About</span>
                </div>

                <span class="ma-hero-eyebrow d-inline-flex align-items-center gap-2">
                    {{ $aboutPage->hero_eyebrow ?? 'About Meraki Foils' }}
                    <span class="ma-hero-dot"></span>
                </span>

                <h1 class="ma-hero-title mt-3">
                    {{ $aboutPage->hero_title ?? 'Industry-recognised' }}<br>
                    <span class="ma-hero-gradient">
                        {{ $aboutPage->hero_highlight ?? 'aluminium foil specialists.' }}
                    </span>
                </h1>

                @if($aboutPage->hero_description)
                    <p class="ma-hero-lead mt-3">
                        {{ $aboutPage->hero_description }}
                    </p>
                @endif

                @if(count($aboutPage->hero_chips_array))
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        @foreach($aboutPage->hero_chips_array as $chip)
                            <span class="ma-hero-chip">
                                <i class="bi bi-patch-check"></i>
                                {{ $chip }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div class="row g-3 mt-4 ma-hero-stats">
                    <div class="col-4">
                        <div class="ma-hero-stat">
                            <div class="ma-hero-stat-val">
                                {{ $aboutPage->hero_stat_1_value ?? '50+' }}
                            </div>
                            <div class="ma-hero-stat-key">
                                {{ $aboutPage->hero_stat_1_label ?? 'Years of know-how*' }}
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="ma-hero-stat">
                            <div class="ma-hero-stat-val">
                                {{ $aboutPage->hero_stat_2_value ?? '250+' }}
                            </div>
                            <div class="ma-hero-stat-key">
                                {{ $aboutPage->hero_stat_2_label ?? 'Active SKUs' }}
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="ma-hero-stat">
                            <div class="ma-hero-stat-val">
                                {{ $aboutPage->hero_stat_3_value ?? '99.5%' }}
                            </div>
                            <div class="ma-hero-stat-key">
                                {{ $aboutPage->hero_stat_3_label ?? 'On-time delivery' }}
                            </div>
                        </div>
                    </div>
                </div>

                @if($aboutPage->hero_footnote)
                    <p class="ma-hero-footnote small text-body-secondary mt-2">
                        {{ $aboutPage->hero_footnote }}
                    </p>
                @endif
            </div>

            <div class="col-lg-6">
                <div class="ma-hero-visual rounded-4 shadow-lg border position-relative overflow-hidden">
                    <svg class="ma-hero-pattern" viewBox="0 0 400 260" aria-hidden="true">
                        <defs>
                            <pattern id="maHeroDots" width="18" height="18" patternUnits="userSpaceOnUse">
                                <circle cx="1" cy="1" r="1" fill="#cbd5e1" opacity=".5" />
                            </pattern>

                            <linearGradient id="maHeroGrad" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#f9fafb" />
                                <stop offset="100%" stop-color="#e5edf7" />
                            </linearGradient>
                        </defs>

                        <rect width="100%" height="100%" fill="url(#maHeroGrad)" />
                        <rect width="100%" height="100%" fill="url(#maHeroDots)" />
                    </svg>

                    <div class="ma-hero-main-img">
                        <img
                            src="{{ $aboutPage->hero_image_url }}"
                            alt="{{ $aboutPage->hero_eyebrow ?? 'Meraki Foils' }}"
                            class="w-100 h-100 object-cover">
                        <span class="ma-hero-shine"></span>
                    </div>

                    @if($aboutPage->hero_tag_1)
                        <div class="ma-hero-tag ma-hero-tag-left">
                            <i class="bi bi-shield-check"></i>
                            <span>{{ $aboutPage->hero_tag_1 }}</span>
                        </div>
                    @endif

                    @if($aboutPage->hero_tag_2)
                        <div class="ma-hero-tag ma-hero-tag-right">
                            <i class="bi bi-graph-up-arrow"></i>
                            <span>{{ $aboutPage->hero_tag_2 }}</span>
                        </div>
                    @endif

                    <div class="ma-hero-pill">
                        <div class="small fw-semibold text-uppercase text-body-secondary">
                            Trusted by brands in
                        </div>

                        <div class="fw-bold">
                            @if(count($aboutPage->hero_chips_array))
                                {{ implode(' • ', $aboutPage->hero_chips_array) }}
                            @else
                                Pharma • Food & Dairy • Cosmetics • Confectionery
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============= Story / Journey ============= -->
<section class="section ma-story">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <span class="ma-section-eyebrow d-inline-flex align-items-center gap-2">
                    {{ $aboutPage->journey_eyebrow ?? 'Our journey' }}
                    <span class="ma-section-dot"></span>
                </span>

                <h2 class="ma-section-title mt-2">
                    {{ $aboutPage->journey_title ?? 'From a single line to a full-spectrum foil partner.' }}
                </h2>

                @if($aboutPage->journey_description_1)
                    <p class="text-secondary mt-2">
                        {{ $aboutPage->journey_description_1 }}
                    </p>
                @endif

                @if($aboutPage->journey_description_2)
                    <p class="text-secondary mb-0">
                        {{ $aboutPage->journey_description_2 }}
                    </p>
                @endif
            </div>

            <div class="col-lg-7">
                <div class="ma-timeline">
                    @forelse($timelines as $timeline)
                        <article class="ma-timeline-item">
                            <div class="ma-timeline-node">
                                {{ $loop->iteration }}
                            </div>

                            <div class="ma-timeline-body">
                                <h3 class="h6 mb-1">
                                    {{ $timeline->title }}
                                </h3>

                                @if($timeline->description)
                                    <p class="small text-secondary mb-0">
                                        {{ $timeline->description }}
                                    </p>
                                @endif
                            </div>
                        </article>
                    @empty
                        <article class="ma-timeline-item">
                            <div class="ma-timeline-node">1</div>

                            <div class="ma-timeline-body">
                                <h3 class="h6 mb-1">Foundations in aluminium converting</h3>
                                <p class="small text-secondary mb-0">
                                    The team’s expertise is rooted in decades of working with aluminium.
                                </p>
                            </div>
                        </article>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============= Mission & Vision ============= -->
<section class="section ma-mission">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
                <article class="ma-card h-100">
                    <span class="ma-section-eyebrow d-inline-flex align-items-center gap-2 mb-2">
                        {{ $aboutPage->mission_eyebrow ?? 'Mission' }}
                        <span class="ma-section-dot"></span>
                    </span>

                    <h2 class="h4 fw-semibold mb-2">
                        {{ $aboutPage->mission_title ?? 'Empowering industries with reliable foil solutions.' }}
                    </h2>

                    @if($aboutPage->mission_description)
                        <p class="text-secondary">
                            {{ $aboutPage->mission_description }}
                        </p>
                    @endif

                    @if(count($aboutPage->mission_points_array))
                        <ul class="list-unstyled ma-list mt-3 mb-0">
                            @foreach($aboutPage->mission_points_array as $point)
                                <li>
                                    <i class="bi bi-check2-circle"></i>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </article>
            </div>

            <div class="col-lg-6">
                <article class="ma-card ma-card-dark h-100">
                    <span class="ma-section-eyebrow ma-section-eyebrow-light d-inline-flex align-items-center gap-2 mb-2">
                        {{ $aboutPage->vision_eyebrow ?? 'Vision' }}
                        <span class="ma-section-dot ma-section-dot-light"></span>
                    </span>

                    <h2 class="h4 fw-semibold mb-2 text-white">
                        {{ $aboutPage->vision_title ?? 'Redefining foil packaging for a sustainable future.' }}
                    </h2>

                    @if($aboutPage->vision_description)
                        <p class="text-white-50">
                            {{ $aboutPage->vision_description }}
                        </p>
                    @endif

                    @if(count($aboutPage->vision_points_array))
                        <div class="ma-pill-grid">
                            @foreach($aboutPage->vision_points_array as $point)
                                <span class="ma-pill-light">
                                    <i class="bi bi-check2-circle"></i>
                                    {{ $point }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ============= Why Meraki Foils ============= -->
<section class="section ma-why">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <span class="ma-section-eyebrow d-inline-flex align-items-center gap-2">
                    {{ $aboutPage->why_eyebrow ?? 'Why Meraki Foils' }}
                    <span class="ma-section-dot"></span>
                </span>

                <h2 class="ma-section-title mt-2">
                    {{ $aboutPage->why_title ?? 'Why customers keep coming back.' }}
                </h2>

                @if($aboutPage->why_description)
                    <p class="text-secondary">
                        {{ $aboutPage->why_description }}
                    </p>
                @endif

                @if(count($aboutPage->why_micro_points_array))
                    <div class="ma-why-micro mt-3">
                        @foreach($aboutPage->why_micro_points_array as $point)
                            <span>
                                <i class="bi bi-patch-check"></i>
                                {{ $point }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-lg-7">
                <div class="row g-3">
                    @forelse($features as $feature)
                        <div class="col-md-6">
                            <div class="ma-why-card h-100">
                                <div class="ma-why-icon">
                                    <i class="{{ $feature->icon ?: 'bi bi-award' }}"></i>
                                </div>

                                <h3 class="h6 mb-1">
                                    {{ $feature->title }}
                                </h3>

                                @if($feature->description)
                                    <p class="small text-secondary mb-0">
                                        {{ $feature->description }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-md-6">
                            <div class="ma-why-card h-100">
                                <div class="ma-why-icon">
                                    <i class="bi bi-award"></i>
                                </div>

                                <h3 class="h6 mb-1">Superior quality</h3>

                                <p class="small text-secondary mb-0">
                                    Stringent checks from incoming aluminium to final slit rolls.
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- micro CTA -->
        <div class="ma-cta-box mt-5">
            <div class="row g-3 align-items-center">
                <div class="col-lg-8">
                    <h3 class="h5 mb-1">
                        {{ $aboutPage->cta_title ?? 'Looking for a new foil partner?' }}
                    </h3>

                    @if($aboutPage->cta_description)
                        <p class="small text-secondary mb-0">
                            {{ $aboutPage->cta_description }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-4 text-lg-end">
                    <a href="{{ $aboutPage->cta_button_link ?: url('/#rfq') }}" class="btn btn-gradient rounded-pill px-4">
                        {{ $aboutPage->cta_button_text ?? 'Share your spec' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection