@extends('frontend.master')

@section('title', 'Products — Meraki Foils')

@section('content')

@php
    $heroProduct = $featuredProducts->first();
@endphp

<!-- ===== DISTINCT HERO ===== -->
<section class="prdx-hero">
    <div class="prdx-heroGrid"></div>

    <div class="container position-relative">
        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-lg-6">
                <span class="prdx-eyebrow">
                    Products <span class="prdx-dot"></span>
                </span>

                <h1 class="prdx-title display-5 mt-2">
                    Foils by application—<span class="gradient-text">engineered</span> to spec.
                </h1>

                <p class="prdx-lead mt-2">
                    Blister and strip foils for pharma, lidding foils for food & dairy, and custom laminates—optimized for barrier, sealability, and print.
                </p>

                <div class="d-flex flex-wrap gap-2 prdx-mt-3">
                    @forelse($categories as $category)
                        <span class="prdx-chip">
                            @if($category->icon)
                                <i class="{{ $category->icon }}"></i>
                            @else
                                <i class="bi bi-box-seam"></i>
                            @endif
                            {{ $category->name }}
                        </span>
                    @empty
                        <span class="prdx-chip"><i class="bi bi-capsule-pill"></i> Pharma</span>
                        <span class="prdx-chip"><i class="bi bi-basket2"></i> Food & Dairy</span>
                    @endforelse
                </div>

                <div class="prdx-mt-3">
                    <span class="prdx-heroBadge">
                        <i class="bi bi-patch-check"></i> cGMP aligned
                    </span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="prdx-heroMedia p-2 p-md-3">
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
                        <img
                            src="{{ $heroProduct ? $heroProduct->main_image_url : asset('assets/img/products/blister-foil.png') }}"
                            alt="{{ $heroProduct ? $heroProduct->name : 'Blister foil' }}"
                            class="w-100 h-100"
                            style="object-fit: cover;">
                    </div>

                    <span class="prdx-vizLabel">
                        <i class="bi bi-graph-up-arrow me-1"></i> Tight register
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== Sticky Filter Bar ===== -->
<div class="prdx-filterWrap">
    <div class="container">
        <nav class="prdx-filterBar">
            @if($featuredProducts->count())
                <a class="prdx-filterBtn active" href="#prdx-featured">
                    <i class="bi bi-stars"></i> Featured
                </a>
            @endif

            @foreach($categories as $category)
                @if($category->activeProducts->count())
                    <a class="prdx-filterBtn" href="#prdx-{{ $category->slug }}">
                        @if($category->icon)
                            <i class="{{ $category->icon }}"></i>
                        @else
                            <i class="bi bi-box-seam"></i>
                        @endif
                        {{ $category->name }}
                    </a>
                @endif
            @endforeach

            @if($compareProducts->count())
                <a class="prdx-filterBtn" href="#prdx-compare">
                    <i class="bi bi-table"></i> Compare
                </a>
            @endif

            <a class="prdx-filterBtn" href="#prdx-cta">
                <i class="bi bi-file-text"></i> RFQ
            </a>
        </nav>
    </div>
</div>

<!-- ===== Featured Products ===== -->
@if($featuredProducts->count())
<section id="prdx-featured" class="section bg-light">
    <div class="container">

        <div class="prdx-sectionHead text-center mb-4 mb-lg-5">
            <span class="prdx-eyebrow">
                Top picks <span class="prdx-dot"></span>
            </span>

            <h2 class="display-6 fw-semibold mt-2">Featured Products</h2>
            <p class="text-secondary prdx-mb-0">Most requested specs and formats.</p>
        </div>

        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-md-6">
                    <article class="prdx-card h-100">

                        <div class="prdx-cardMedia">
                            <a href="{{ route('products.show', $product->slug) }}" class="d-block">
                                <div class="ratio ratio-16x9">
                                    <img
                                        src="{{ $product->main_image_url }}"
                                        alt="{{ $product->name }}"
                                        style="width:100%;height:100%;object-fit:cover;">
                                </div>
                            </a>

                            @if(count($product->badges_array))
                                <div class="prdx-badges">
                                    @foreach($product->badges_array as $badge)
                                        <span class="prdx-badge">{{ $badge }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <span class="prdx-sheen"></span>
                        </div>

                        <div class="prdx-cardBody p-3 p-lg-4">
                            <h3 class="h4 mb-1">
                                <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            @if($product->short_description)
                                <p class="text-secondary mb-3">
                                    {{ $product->short_description }}
                                </p>
                            @endif

                            @if(count($product->specs_array))
                                <ul class="prdx-specs list-unstyled d-flex flex-wrap">
                                    @foreach($product->specs_array as $spec)
                                        <li class="prdx-spec">{{ $spec }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="prdx-ctaRow mt-2">
                                <a class="btn btn-outline-dark btn-sm rounded-pill" href="{{ route('products.show', $product->slug) }}">
                                    View Details
                                </a>

                                <a class="btn btn-gradient btn-sm rounded-pill" href="#prdx-cta">
                                    Get a Quote
                                </a>
                            </div>
                        </div>

                    </article>
                </div>
            @endforeach
        </div>

        <div class="prdx-miniCta mt-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <div>
                    <strong>Need a custom laminate or lidding structure?</strong>
                    <div class="text-secondary small">
                        Share your application; we’ll advise a stack-up and targets.
                    </div>
                </div>

                <a href="#prdx-cta" class="btn btn-gradient rounded-pill px-4">
                    Share your spec
                </a>
            </div>
        </div>

    </div>
</section>
@endif

<!-- ===== Category Wise Products ===== -->
@foreach($categories as $category)
    @if($category->activeProducts->count())
        <section id="prdx-{{ $category->slug }}" class="section {{ $loop->even ? 'bg-light' : '' }}">
            <div class="container">

                <div class="prdx-sectionHead text-center mb-4 mb-lg-5">
                    <span class="prdx-eyebrow">
                        {{ $category->name }} <span class="prdx-dot"></span>
                    </span>

                    <h2 class="h3 fw-semibold mt-2">
                        {{ $category->name }} Products
                    </h2>

                    <p class="text-secondary prdx-mb-0">
                        Explore our {{ strtolower($category->name) }} product range.
                    </p>
                </div>

                <div class="row g-4">
                    @foreach($category->activeProducts as $product)
                        <div class="col-sm-6 col-lg-4">
                            <article class="prdx-card h-100">

                                <div class="prdx-cardMedia">
                                    <a href="{{ route('products.show', $product->slug) }}" class="d-block">
                                        <div class="ratio ratio-4x3">
                                            <img
                                                src="{{ $product->main_image_url }}"
                                                alt="{{ $product->name }}"
                                                style="width:100%;height:100%;object-fit:cover;">
                                        </div>
                                    </a>

                                    @if(count($product->badges_array))
                                        <div class="prdx-badges">
                                            @foreach($product->badges_array as $badge)
                                                <span class="prdx-badge">{{ $badge }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <span class="prdx-sheen"></span>
                                </div>

                                <div class="prdx-cardBody">
                                    <h3 class="h5 mb-1">
                                        <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">
                                            {{ $product->name }}
                                        </a>
                                    </h3>

                                    @if($product->short_description)
                                        <p class="text-secondary small mb-2">
                                            {{ $product->short_description }}
                                        </p>
                                    @endif

                                    @if(count($product->specs_array))
                                        <div class="prdx-specs">
                                            @foreach($product->specs_array as $spec)
                                                <span class="prdx-spec">{{ $spec }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="prdx-ctaRow mt-3">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill" href="{{ route('products.show', $product->slug) }}">
                                            View Details
                                        </a>

                                        <a class="btn btn-gradient btn-sm rounded-pill" href="#prdx-cta">
                                            RFQ
                                        </a>
                                    </div>
                                </div>

                            </article>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif
@endforeach

<!-- ===== Comparison ===== -->
@if($compareProducts->count())
<section id="prdx-compare" class="section bg-light">
    <div class="container">

        <div class="prdx-sectionHead text-center mb-4">
            <span class="prdx-eyebrow">
                Quick view <span class="prdx-dot"></span>
            </span>

            <h2 class="h3 fw-semibold mt-2">Product Comparison</h2>
        </div>

        <div class="table-responsive prdx-table">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        @foreach($compareProducts as $product)
                            <th>{{ $product->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Thickness</td>
                        @foreach($compareProducts as $product)
                            <td>{{ $product->thickness ?? '—' }}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <td>Use</td>
                        @foreach($compareProducts as $product)
                            <td>{{ $product->application ?? '—' }}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <td>Key Feature</td>
                        @foreach($compareProducts as $product)
                            <td>{{ $product->key_feature ?? '—' }}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <td>Options</td>
                        @foreach($compareProducts as $product)
                            <td>{{ $product->options ?? '—' }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center prdx-mt-3">
            <a href="#prdx-cta" class="btn btn-gradient rounded-pill px-4">
                Not sure? Ask for guidance
            </a>
        </div>

    </div>
</section>
@endif

<!-- ===== Empty State ===== -->
@if(!$featuredProducts->count() && !$categories->filter(fn($cat) => $cat->activeProducts->count())->count())
<section class="section bg-light">
    <div class="container text-center">
        <div class="prdx-miniCta">
            <h3 class="fw-semibold mb-2">No products available</h3>
            <p class="text-secondary mb-0">Products will appear here after adding them from admin panel.</p>
        </div>
    </div>
</section>
@endif

<!-- ===== RFQ / CTA ===== -->
<section id="prdx-cta" class="section cta position-relative overflow-hidden">
    <span class="cta-glow cta-glow-1 d-none d-md-block"></span>
    <span class="cta-glow cta-glow-2 d-none d-md-block"></span>
    <div class="cta-grid d-none d-lg-block" aria-hidden="true"></div>

    <div class="container position-relative">
        <div class="row g-4 align-items-center">

            <div class="col-lg-7 order-2 order-lg-1">
                <form class="rfq-card glass p-4 p-md-5 rounded-4 shadow-lg" onsubmit="event.preventDefault()">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
                        <div class="d-flex align-items-center gap-2 rfq-steps">
                            <span class="rfq-step active"><span class="dot"></span> Spec</span>
                            <span class="rfq-divider"></span>
                            <span class="rfq-step"><span class="dot"></span> Review</span>
                            <span class="rfq-divider"></span>
                            <span class="rfq-step"><span class="dot"></span> Quote</span>
                        </div>

                        <span class="badge rounded-pill text-dark bg-brand-soft fw-semibold">
                            Avg reply &lt; 24h
                        </span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <div class="fi">
                                <i class="bi bi-person"></i>
                                <input type="text" class="form-control" placeholder="Your name" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Company</label>
                            <div class="fi">
                                <i class="bi bi-building"></i>
                                <input type="text" class="form-control" placeholder="Company name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <div class="fi">
                                <i class="bi bi-envelope"></i>
                                <input type="email" class="form-control" placeholder="you@company.com" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <div class="fi">
                                <i class="bi bi-telephone"></i>
                                <input type="tel" class="form-control" placeholder="+91 …">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Spec / Message</label>
                            <div class="fi fi-textarea">
                                <i class="bi bi-journal-text"></i>
                                <textarea class="form-control" rows="4" placeholder="Microns, temper, coatings, widths, prints, volumes…"></textarea>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-gradient w-100 mt-3">
                        Submit RFQ
                    </button>

                    <p class="text-muted small mt-2 mb-0">
                        This is a static demo form.
                    </p>
                </form>
            </div>

            <div class="col-lg-5 order-1 order-lg-2">
                <span class="prdx-eyebrow text-white-75">
                    Request a Quote <span class="prdx-dot"></span>
                </span>

                <h2 class="display-6 text-white mt-2 lh-1">
                    Tell us your spec
                </h2>

                <p class="text-white-75 lead mt-2">
                    Share application, microns, temper, coatings/laminate, widths & print. We’ll advise and quote fast.
                </p>

                <ul class="list-unstyled text-white-75 small d-grid gap-2 prdx-mt-3">
                    <li class="d-flex gap-2 align-items-start">
                        <i class="bi bi-check2-circle text-brand"></i> Application & industry
                    </li>
                    <li class="d-flex gap-2 align-items-start">
                        <i class="bi bi-check2-circle text-brand"></i> Micron / temper / coating
                    </li>
                    <li class="d-flex gap-2 align-items-start">
                        <i class="bi bi-check2-circle text-brand"></i> Slit width / core ID / max OD
                    </li>
                    <li class="d-flex gap-2 align-items-start">
                        <i class="bi bi-check2-circle text-brand"></i> Print colors & registration
                    </li>
                </ul>

                <div class="d-flex flex-wrap gap-2 prdx-mt-3">
                    <span class="trust-chip"><i class="bi bi-clock-history"></i> 99.5% On-time</span>
                    <span class="trust-chip"><i class="bi bi-shield-check"></i> cGMP aligned</span>
                    <span class="trust-chip"><i class="bi bi-recycle"></i> Recyclability first</span>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection