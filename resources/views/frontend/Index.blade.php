@extends('frontend.master')
@section('content')
    

<!-- ============= Hero ============= -->
<section class="hero position-relative py-5 py-lg-6 overflow-hidden">
  <!-- decorative glow -->
  <span class="hero-glow d-none d-md-block" aria-hidden="true"></span>

  <div class="container position-relative">
    <div class="row align-items-center g-4 g-lg-5">
      <!-- Copy -->
      <div class="col-lg-6">
        <span class="eyebrow d-inline-flex align-items-center gap-2">
          Premium Aluminium Foils
          <span class="dot"></span>
        </span>

        <h1 class="display-5 fw-bold mt-2 lh-1">
          Pharma-grade quality.<br class="d-none d-md-inline" />
          Custom specs. <span class="gradient-text">On-time, every time.</span>
        </h1>

        <p class="lead text-secondary mt-3">
          Blister &amp; strip foils tailored by micron, temper, coatings, and print—engineered to protect what matters.
        </p>

        <div class="d-flex flex-wrap gap-2 mt-3">
          <a href="#rfq" class="btn btn-gradient px-4 py-2 rounded-pill">Get a Quote</a>
          <a href="products.html" class="btn btn-outline-dark px-4 py-2 rounded-pill">Explore Products</a>
        </div>

        <!-- Chips -->
        <div class="d-flex gap-2 mt-4 overflow-auto small-hide-scroll">
          <span class="chip">Pharma</span>
          <span class="chip">Food &amp; Dairy</span>
          <span class="chip">Cosmetics</span>
          <span class="chip">Confectionery</span>
        </div>

        <!-- Quick stats -->
        <div class="row row-cols-3 g-3 mt-4 mt-lg-5 hero-stats">
          <div class="col">
            <div class="stat">
              <div class="stat-val">99.5%</div>
              <div class="stat-key">On-time</div>
            </div>
          </div>
          <div class="col">
            <div class="stat">
              <div class="stat-val">250+</div>
              <div class="stat-key">Active SKUs</div>
            </div>
          </div>
          <div class="col">
            <div class="stat">
              <div class="stat-val">4</div>
              <div class="stat-key">Industries</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Visual -->
      <div class="col-lg-6">
        <div class="hero-viz rounded-4 shadow-lg border position-relative">
          <!-- pattern backdrop -->
          <svg class="foil-pattern" viewBox="0 0 400 300" aria-hidden="true">
            <defs>
              <linearGradient id="hv-bg" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%"  stop-color="#f7fafc"/>
                <stop offset="100%" stop-color="#e6edf6"/>
              </linearGradient>
              <pattern id="hv-grid" width="18" height="20" patternUnits="userSpaceOnUse">
                <polygon points="9,0 18,5 18,15 9,20 0,15 0,5"
                         fill="none" stroke="#cfd8e3" stroke-opacity=".35" stroke-width="1"/>
              </pattern>
              <linearGradient id="hv-sheen" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="rgba(255,255,255,0)"/>
                <stop offset="50%" stop-color="rgba(255,255,255,.55)"/>
                <stop offset="100%" stop-color="rgba(255,255,255,0)"/>
              </linearGradient>
            </defs>
            <rect width="100%" height="100%" fill="url(#hv-bg)"/>
            <rect width="100%" height="100%" fill="url(#hv-grid)"/>
            <rect class="sheen-sweep" width="60%" height="100%" fill="url(#hv-sheen)" />
          </svg>

          <!-- main masked shot -->
          <figure class="hero-shot m-0">
            <img src="assets/img/hero-foil.png" alt="Aluminium foil production line" class="w-100 h-100 object-cover">
            <i class="shine" aria-hidden="true"></i>
          </figure>

          <!-- two angled mini tiles (use any images you like) -->
          <figure class="mini-tile t1">
            <img src="assets/img/reel-thumb.png" alt="Foil reels" class="w-100 h-100 object-cover">
          </figure>
          <figure class="mini-tile t2">
            <img src="assets/img/reel-thumb.png" alt="Quality check" class="w-100 h-100 object-cover">
          </figure>

          <!-- glass tags -->
          <div class="viz-tags left">
            <span class="glass-tag"><i class="bi bi-sliders2"></i> Microns 20–45</span>
            <span class="glass-tag"><i class="bi bi-rulers"></i> Widths 50–1200mm</span>
          </div>
          <div class="viz-tags right">
            <span class="glass-tag"><i class="bi bi-droplet-half"></i> HSL / Primer</span>
            <span class="glass-tag"><i class="bi bi-palette2"></i> Up to 6 colors</span>
          </div>

          <!-- conveyor ticker -->
          <div class="viz-ticker" aria-hidden="true">
            <span>QA • Pinhole control</span>
            <span>cGMP aligned</span>
            <span>Cleanroom handling</span>
            <span>Traceable batches</span>
            <span>QA • Pinhole control</span>
            <span>cGMP aligned</span>
            <span>Cleanroom handling</span>
            <span>Traceable batches</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ============= Clients / Logo Strip (Simple) ============= -->
<section class="clients py-5">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
      <div class="text-uppercase small text-muted fw-semibold letter-2">
        Trusted by leaders
      </div>
      <div class="text-muted small d-none d-md-inline">
        Sampling of customers &amp; partners
      </div>
    </div>

    <div class="clients-row">
      <div class="client-logo" aria-label="Sun Pharma">
        <img src="assets/img/clients/Sun-Pharma.png" alt="Sun Pharma">
      </div>
      <div class="client-logo" aria-label="Alkem">
        <img src="assets/img/clients/Alkem_Laboratories.png" alt="Alkem">
      </div>
      <div class="client-logo" aria-label="Cachet">
        <img src="assets/img/clients/cackhet.png" alt="Cachet">
      </div>
      <div class="client-logo" aria-label="Shreya Life Sciences">
        <img src="assets/img/clients/shreya.png" alt="Shreya Life Sciences">
      </div>
      <div class="client-logo" aria-label="Galpha">
        <img src="assets/img/clients/gl.png" alt="Galpha">
      </div>
      <div class="client-logo" aria-label="Client">
        <img src="assets/img/clients/Sun-Pharma.png" alt="Client">
      </div>
    </div>
  </div>
</section>


@php
    $about = $aboutPage ?? \App\Models\AboutPage::active()->latest()->first();

    $heroTitle = $about->hero_title ?? 'About';
    $heroHighlight = $about->hero_highlight ?? 'Meraki Foils';
    $description = $about->hero_description ?? 'We manufacture aluminium foils for critical packaging across pharma, food & dairy, cosmetics, and confectionery—backed by strict QA, traceability, and reliable delivery.';

    $chips = $about?->hero_chips_array ?? [
        'cGMP-aligned processes & batch traceability',
        'Custom microns, tempers, coatings & laminates',
        'Dependable lead times with responsive support',
    ];
@endphp

@if($about)
<section id="about" class="section about">
    <span class="about-blob d-none d-lg-block"></span>

    <div class="container position-relative">
        <div class="row g-4 g-lg-5 align-items-center">

            <div class="col-lg-6">
                <span class="eyebrow d-inline-flex align-items-center gap-2">
                    {{ $about->hero_eyebrow ?? 'Who we are' }}
                    <span class="dot"></span>
                </span>

                <h2 class="display-6 fw-semibold mt-2 mb-2">
                    {{ $heroTitle }}
                    <span class="grad-accent">{{ $heroHighlight }}</span>
                </h2>

                <p class="text-secondary mb-3">
                    {{ $description }}
                </p>

                @if(count($chips))
                    <ul class="list-unstyled about-highlights mb-3">
                        @foreach($chips as $chip)
                            <li>
                                <i class="bi bi-shield-check"></i>
                                {{ $chip }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="row g-3">
                    @if($about->hero_stat_1_value || $about->hero_stat_1_label)
                        <div class="col-6 col-md-5">
                            <div class="metric-chip">
                                <div class="m-val">
                                    {{ $about->hero_stat_1_value ?? '99.5%' }}
                                </div>
                                <div class="m-key">
                                    {{ $about->hero_stat_1_label ?? 'On-time' }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($about->hero_stat_2_value || $about->hero_stat_2_label)
                        <div class="col-6 col-md-5">
                            <div class="metric-chip">
                                <div class="m-val">
                                    {{ $about->hero_stat_2_value ?? '250+' }}
                                </div>
                                <div class="m-key">
                                    {{ $about->hero_stat_2_label ?? 'Active SKUs' }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="{{ route('about') }}" class="btn btn-outline-dark rounded-pill px-4">
                        Know More
                    </a>

                    <a href="{{ url('/#rfq') }}" class="btn btn-gradient rounded-pill px-4">
                        Request a Quote
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-media position-relative">

                    <div class="am-main shadow-lg">
                        <img src="{{ $about->hero_image_url }}"
                             alt="{{ $about->hero_title ?? 'Meraki Foils' }}"
                             class="w-100 h-100 object-cover">

                        <span class="am-sheen"></span>
                    </div>

                    <div class="am-thumb am-thumb-1 shadow">
                        <img src="{{ asset('assets/img/about_detail-1.png') }}"
                             alt="Precision slitting"
                             class="w-100 h-100 object-cover rounded-4">
                    </div>

                    <div class="am-thumb am-thumb-2 shadow">
                        <img src="{{ asset('assets/img/about_detail-2.png') }}"
                             alt="Cleanroom handling"
                             class="w-100 h-100 object-cover rounded-4">
                    </div>

                    <div class="am-badge glassy">
                        <i class="bi bi-graph-up-arrow"></i>
                        {{ $about->hero_tag_1 ?? 'Consistent QA' }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endif




@php
    $capabilities = $capabilities ?? \App\Models\Capability::active()
        ->orderBy('sort_order')
        ->latest()
        ->get();
@endphp

@if($capabilities->count())
    <section id="capabilities" class="section cap bg-light">
        <div class="container">

            <div class="section-head text-center mb-4 mb-lg-5">
                <span class="eyebrow d-inline-flex align-items-center gap-2">
                    What we run
                    <span class="dot"></span>
                </span>

                <h2 class="display-6 fw-semibold mt-2">
                    Capabilities
                </h2>

                <p class="text-secondary lead mb-0">
                    From rotogravure printing to precision slitting—end-to-end control.
                </p>
            </div>

            <div class="row g-4 cap-grid">

                @foreach($capabilities as $capability)
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="cap-card h-100">

                            <div class="cap-media rounded-4">
                                <picture>
                                    <source srcset="{{ $capability->image_url }}" type="image/webp">

                                    <img src="{{ $capability->image_url }}"
                                         alt="{{ $capability->title }}"
                                         loading="lazy">
                                </picture>

                                @if($capability->badge_text)
                                    <span class="cap-badge">
                                        @if($capability->badge_icon)
                                            <i class="{{ $capability->badge_icon }}"></i>
                                        @endif

                                        {{ $capability->badge_text }}
                                    </span>
                                @endif

                                <span class="cap-sheen"></span>
                            </div>

                            <div class="cap-body">
                                <h3 class="h5 mb-1">
                                    {{ $capability->title }}
                                </h3>

                                @if($capability->description)
                                    <p class="text-secondary small mb-3">
                                        {{ $capability->description }}
                                    </p>
                                @endif

                                @if(count($capability->tags_array))
                                    <div class="cap-tags">
                                        @foreach($capability->tags_array as $tag)
                                            <span>{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endif

@php
    $homeProducts = $homeProducts ?? \App\Models\Product::with(['category', 'media'])
        ->active()
        ->featured()
        ->orderBy('sort_order')
        ->latest()
        ->take(2)
        ->get();
@endphp

@if($homeProducts->count())
    <section id="products" class="section products">
        <div class="container">

            <div class="section-head text-center mb-4 mb-lg-5">
                <span class="eyebrow d-inline-flex align-items-center gap-2">
                    Our portfolio <span class="dot"></span>
                </span>

                <h2 class="display-6 fw-semibold mt-2">
                    Products
                </h2>

                <p class="text-secondary lead mb-0">
                    Blister &amp; strip foils, plus custom laminates and lidding solutions.
                </p>
            </div>

            <div class="row g-4">
                @foreach($homeProducts as $product)
                    <div class="col-md-6">
                        <article class="pro-card h-100">

                            <div class="pro-media ratio ratio-16x9 rounded-4 overflow-hidden">
                                <img src="{{ $product->main_image_url }}"
                                     alt="{{ $product->name }}"
                                     class="object-cover">

                                <div class="pro-overlay"></div>
                                <span class="pro-sheen"></span>

                                @if(count($product->badges_array))
                                    <div class="pro-badges">
                                        @foreach($product->badges_array as $badge)
                                            <span class="glass-badge">
                                                @if($loop->first)
                                                    <i class="bi bi-capsule-pill"></i>
                                                @endif

                                                {{ $badge }}
                                            </span>
                                        @endforeach
                                    </div>
                                @elseif($product->category)
                                    <div class="pro-badges">
                                        <span class="glass-badge">
                                            <i class="bi bi-box-seam"></i>
                                            {{ $product->category->name }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="pro-body p-3 p-lg-4">
                                <h3 class="h4 mb-1 d-flex align-items-center gap-2">
                                    <span class="pro-dot"></span>
                                    {{ $product->name }}
                                </h3>

                                @if($product->short_description)
                                    <p class="text-secondary mb-3">
                                        {{ $product->short_description }}
                                    </p>
                                @endif

                                @if(count($product->specs_array))
                                    <ul class="pro-specs list-unstyled d-flex flex-wrap gap-2 mb-3">
                                        @foreach($product->specs_array as $spec)
                                            <li class="spec">
                                                {{ $spec }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="d-flex flex-wrap gap-2">
                                    <a class="btn btn-outline-dark btn-sm rounded-pill"
                                       href="{{ route('products.show', $product->slug) }}">
                                        View Details
                                    </a>

                                    <a class="btn btn-gradient btn-sm rounded-pill"
                                       href="{{ url('/#rfq') }}">
                                        Get a Quote
                                    </a>
                                </div>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                    Explore All Products
                </a>
            </div>

        </div>
    </section>
@endif


@php
    $homeIndustries = $homeIndustries ?? \App\Models\Industry::active()
        ->orderBy('sort_order')
        ->latest()
        ->take(4)
        ->get();
@endphp

@if($homeIndustries->count())
    <section id="industries" class="section ind bg-light">
        <div class="container">

            <div class="section-head text-center mb-4 mb-lg-5">
                <span class="eyebrow d-inline-flex align-items-center gap-2">
                    Applications we serve
                    <span class="dot"></span>
                </span>

                <h2 class="display-6 fw-semibold mt-2">
                    Industries Served
                </h2>

                <p class="text-secondary lead mb-0">
                    Pharma, food &amp; dairy, cosmetics, and confectionery—engineered by spec.
                </p>
            </div>

            <div class="row g-4 ind-grid">

                @foreach($homeIndustries as $industry)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a class="ind-card"
                           href="{{ route('industries.index') }}#{{ $industry->slug }}"
                           aria-label="{{ $industry->title }}">

                            <div class="ind-media ratio ratio-4x3 rounded-4">
                                <img src="{{ $industry->image_url }}"
                                     class="w-100 h-100 object-cover rounded-4"
                                     alt="{{ $industry->title }}">

                                <span class="ind-sheen"></span>
                            </div>

                            <div class="ind-body">
                                <h3 class="h6 mb-1">
                                    {{ $industry->title }}
                                </h3>

                                <small class="text-secondary">
                                    {{ $industry->badge_text ?: \Illuminate\Support\Str::limit($industry->description, 35) }}
                                </small>
                            </div>

                        </a>
                    </div>
                @endforeach

            </div>

            <div class="text-center mt-4">
                <a href="{{ route('industries.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                    Explore All Industries
                </a>
            </div>

        </div>
    </section>
@endif




<!-- ============= Quality & Sustainability ============= -->
<section id="quality" class="section quality-wrap position-relative overflow-hidden">
  <!-- soft background bloom -->
  <span class="q-bloom d-none d-md-block"></span>

  <div class="container">
    <div class="row g-4 g-lg-5 align-items-stretch">

      <!-- QUALITY CARD -->
      @php
    $quality = $qualityPage ?? \App\Models\QualityPage::active()->latest()->first();

    $qualityTitle = $quality->hero_title ?? 'Controlled processes.';
    $qualityHighlight = $quality->hero_highlight ?? 'Documented results.';

    $qualityChips = $quality?->hero_chips_array ?? [
        'ISO',
        'cGMP',
        'FSSC',
    ];
@endphp

@if($quality)
    <div class="col-lg-6">
        <article class="q-card h-100 rounded-4">
            <header class="q-head">
                <span class="eyebrow d-inline-flex align-items-center gap-2">
                    {{ $quality->hero_eyebrow ?? 'Quality' }}
                    <span class="dot"></span>
                </span>

                <h2 class="h1 fw-semibold mt-2 mb-0">
                    {{ $qualityTitle }}
                    {{ $qualityHighlight }}
                </h2>

                @if($quality->hero_description)
                    <p class="text-secondary mt-2 mb-0">
                        {{ $quality->hero_description }}
                    </p>
                @endif
            </header>

            <ul class="q-list list-unstyled mt-3 mb-0">
                <li>
                    <span class="q-icon">
                        <i class="bi bi-shield-check"></i>
                    </span>

                    <div>
                        <div class="q-title">
                            Incoming material checks &amp; supplier QA
                        </div>

                        <small class="text-secondary">
                            Lot verification, CoA capture, traceability
                        </small>
                    </div>
                </li>

                <li>
                    <span class="q-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </span>

                    <div>
                        <div class="q-title">
                            In-process inspections &amp; pinhole density limits
                        </div>

                        <small class="text-secondary">
                            Online visual + offline light box
                        </small>
                    </div>
                </li>

                <li>
                    <span class="q-icon">
                        <i class="bi bi-clipboard2-check"></i>
                    </span>

                    <div>
                        <div class="q-title">
                            Final QA: seal/bond strength, WVTR/OTR
                        </div>

                        <small class="text-secondary">
                            Standard methods and documented release checks
                        </small>
                    </div>
                </li>

                <li>
                    <span class="q-icon">
                        <i class="bi bi-patch-check"></i>
                    </span>

                    <div>
                        <div class="q-title">
                            Certificates &amp; compliance
                        </div>

                        @if(count($qualityChips))
                            <div class="q-chips">
                                @foreach($qualityChips as $chip)
                                    <span class="chip small">
                                        {{ $chip }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </li>
            </ul>

            <div class="q-kpis">
                @if($quality->hero_kpi_1_value || $quality->hero_kpi_1_label)
                    <div class="q-kpi">
                        <div class="val">
                            {{ $quality->hero_kpi_1_value ?? '99.5%' }}
                        </div>

                        <div class="key">
                            {{ $quality->hero_kpi_1_label ?? 'On-time' }}
                        </div>
                    </div>
                @endif

                @if($quality->hero_kpi_2_value || $quality->hero_kpi_2_label)
                    <div class="q-kpi">
                        <div class="val">
                            {{ $quality->hero_kpi_2_value ?? '250+' }}
                        </div>

                        <div class="key">
                            {{ $quality->hero_kpi_2_label ?? 'SKUs' }}
                        </div>
                    </div>
                @endif

                @if($quality->hero_kpi_3_value || $quality->hero_kpi_3_label)
                    <div class="q-kpi">
                        <div class="val">
                            {{ $quality->hero_kpi_3_value ?? '4' }}
                        </div>

                        <div class="key">
                            {{ $quality->hero_kpi_3_label ?? 'Industries' }}
                        </div>
                    </div>
                @endif
            </div>
        </article>
    </div>
@endif

      <!-- SUSTAINABILITY CARD -->
      <div class="col-lg-6">
        <article class="s-card h-100 rounded-4">
          <header class="q-head">
            <span class="eyebrow white-eyebrow d-inline-flex align-items-center gap-2">
              Sustainability
              <span class="dot white-dot"></span>
            </span>
            <h3 class="h2 fw-semibold mt-2 mb-0 text-white">Aluminium is infinitely recyclable.</h3>
          </header>

          <p class="text-secondary mb-3 text-white-50">We reduce waste and optimise energy while maintaining performance across barrier and sealability.</p>

          <div class="s-rows">
            <div class="s-row">
              <div class="s-icon"><i class="bi bi-recycle"></i></div>
              <div class="s-body">
                <div class="q-title text-white">Recyclability messaging</div>
                <small class="text-secondary">Claims to be verified per market</small>
              </div>
            </div>

            <div class="s-row">
              <div class="s-icon"><i class="bi bi-lightning-charge"></i></div>
              <div class="s-body">
                <div class="q-title text-white">Waste &amp; energy reduction</div>
                <small class="text-secondary">Trim optimisation, line efficiency (TBD)</small>
              </div>
            </div>

            <div class="s-row">
              <div class="s-icon"><i class="bi bi-box-seam"></i></div>
              <div class="s-body">
                <div class="q-title text-white">Eco-friendly packaging options</div>
                <small class="text-secondary">Core &amp; wrap alternatives (TBD)</small>
              </div>
            </div>
          </div>

          <!-- subtle gradient meter -->
          <div class="s-meter mt-3">
            <div class="track"><span class="fill" style="--p:65%"></span></div>
            <small class="text-secondary">Continuous improvement index (illustrative)</small>
          </div>
        </article>
      </div>

    </div>
  </div>
</section>




  <!-- ============= Process / How We Work ============= -->
<section id="process" class="section process position-relative">
  <!-- soft glow -->
  <span class="proc-glow d-none d-md-block"></span>

  <div class="container">
    <div class="section-head text-center mb-4 mb-lg-5">
      <span class="eyebrow d-inline-flex align-items-center gap-2">
        Our Method
        <span class="dot"></span>
      </span>
      <h2 class="h1 fw-semibold mt-2">How We Work</h2>
      <p class="text-secondary lead mb-0">From spec to shipment—simple, transparent, reliable.</p>
    </div>

    <!-- Timeline rail -->
    <div class="process-rail">
      <!-- Step 1 -->
      <article class="p-step">
        <div class="p-badge">
          <span class="p-num">1</span>
        </div>
        <div class="p-card">
          <div class="p-icon"><i class="bi bi-chat-dots"></i></div>
          <h3 class="p-title">Consultation</h3>
          <p class="p-text">Define application, barrier needs &amp; print.</p>
        </div>
      </article>

      <!-- Step 2 -->
      <article class="p-step">
        <div class="p-badge">
          <span class="p-num">2</span>
        </div>
        <div class="p-card">
          <div class="p-icon"><i class="bi bi-bezier2"></i></div>
          <h3 class="p-title">Prototyping</h3>
          <p class="p-text">Sample rolls &amp; seal trials.</p>
        </div>
      </article>

      <!-- Step 3 -->
      <article class="p-step">
        <div class="p-badge">
          <span class="p-num">3</span>
        </div>
        <div class="p-card">
          <div class="p-icon"><i class="bi bi-gear-wide-connected"></i></div>
          <h3 class="p-title">Production</h3>
          <p class="p-text">Tight tolerances, documented QA.</p>
        </div>
      </article>

      <!-- Step 4 -->
      <article class="p-step">
        <div class="p-badge">
          <span class="p-num">4</span>
        </div>
        <div class="p-card">
          <div class="p-icon"><i class="bi bi-truck"></i></div>
          <h3 class="p-title">Delivery</h3>
          <p class="p-text">On-time logistics &amp; support.</p>
        </div>
      </article>
    </div>
  </div>
</section>


<!-- ============= Certifications ============= -->
<section id="certifications" class="section certifications position-relative overflow-hidden">
  <!-- soft gradient glow -->
  <span class="cert-glow d-none d-md-block"></span>

  <div class="container">
    <!-- Section Head -->
    <div class="section-head text-center mb-4 mb-lg-5">
      <span class="eyebrow d-inline-flex align-items-center gap-2">
        Compliance & Standards
        <span class="dot"></span>
      </span>
      <h2 class="h1 fw-semibold mt-2">Certifications</h2>
      <p class="text-secondary lead mb-0">Aligned with international quality, safety, and manufacturing standards.</p>
    </div>

    <!-- Certification Grid -->
    <div class="row g-4 cert-grid justify-content-center">
      <div class="col-6 col-md-3">
        <div class="cert-card">
          <div class="cert-ring"></div>
          <div class="cert-body">
            <i class="bi bi-patch-check"></i>
            <h3 class="cert-title">ISO 9001</h3>
            <p class="cert-text">Quality Management Systems</p>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="cert-card">
          <div class="cert-ring"></div>
          <div class="cert-body">
            <i class="bi bi-shield-check"></i>
            <h3 class="cert-title">FSSC 22000</h3>
            <p class="cert-text">Food Safety Certification</p>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="cert-card">
          <div class="cert-ring"></div>
          <div class="cert-body">
            <i class="bi bi-cpu"></i>
            <h3 class="cert-title">cGMP</h3>
            <p class="cert-text">Good Manufacturing Practices</p>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="cert-card">
          <div class="cert-ring"></div>
          <div class="cert-body">
            <i class="bi bi-file-earmark-text"></i>
            <h3 class="cert-title">DMF (if applicable)</h3>
            <p class="cert-text">Drug Master File Compliance</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


      

@php
    $homeResources = $homeResources ?? \App\Models\Resource::with(['category', 'media'])
        ->active()
        ->featured()
        ->orderBy('sort_order')
        ->latest()
        ->take(3)
        ->get();
@endphp

@if($homeResources->count())
    <section id="resources" class="section resources position-relative overflow-hidden">
        <span class="res-glow res-glow-1 d-none d-md-block"></span>
        <span class="res-glow res-glow-2 d-none d-md-block"></span>

        <div class="container position-relative">

            <div class="section-head text-center mb-5">
                <span class="eyebrow d-inline-flex align-items-center gap-2">
                    Knowledge Center
                    <span class="dot"></span>
                </span>

                <h2 class="h1 fw-semibold mt-2">
                    Resources
                </h2>

                <p class="text-secondary lead mb-0">
                    Insights, guides &amp; technical notes on aluminium foil packaging.
                </p>
            </div>

            <div class="row g-4">
                @foreach($homeResources as $resource)
                    <div class="col-md-4">
                        <article class="res-card h-100">

                            <div class="res-media">
                                <img src="{{ $resource->image_url }}"
                                     alt="{{ $resource->title }}">

                                <div class="res-overlay"></div>

                                <div class="res-icon">
                                    <i class="{{ $resource->main_icon ?: $resource->type_icon ?: 'bi bi-file-earmark-text' }}"></i>
                                </div>
                            </div>

                            <div class="res-body">
                                <h3 class="h5">
                                    {{ $resource->title }}
                                </h3>

                                @if($resource->short_description)
                                    <p class="small text-secondary mb-3">
                                        {{ $resource->short_description }}
                                    </p>
                                @endif

                                <a href="{{ $resource->button_link }}"
                                   class="res-link"
                                   @if($resource->file_url || $resource->button_url) target="_blank" rel="noopener" @endif>
                                    {{ $resource->button_text ?: 'Read more' }}
                                    <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('resources') }}" class="btn btn-gradient px-4 py-2 fw-semibold">
                    Explore All Resources
                </a>
            </div>

        </div>
    </section>
@endif




 <!-- ============= RFQ / Contact CTA ============= -->
<section id="rfq" class="section cta position-relative overflow-hidden">
  <!-- soft background pattern + glows -->
  <span class="cta-glow cta-glow-1 d-none d-md-block"></span>
  <span class="cta-glow cta-glow-2 d-none d-md-block"></span>
  <div class="cta-grid d-none d-lg-block" aria-hidden="true"></div>

  <div class="container position-relative">
    <div class="row g-4 align-items-start">
      <!-- LEFT: Copy / bullets / micro-trust -->
      <div class="col-lg-5">
        <span class="eyebrow text-white-75 d-inline-flex align-items-center gap-2">
          Request a Quote
          <span class="dot"></span>
        </span>
        <h2 class="display-6 text-white mt-2 lh-1">Tell us your spec</h2>
        <p class="text-white-75 lead mt-2">
          Share your application, target microns, temper, coating/laminate, widths &amp; print. We’ll reply with recommendations and lead times.
        </p>

        <ul class="list-unstyled text-white-75 small mt-3 d-grid gap-2">
          <li class="d-flex gap-2 align-items-start">
            <i class="bi bi-check2-circle text-brand"></i>
            <span>Application &amp; industry</span>
          </li>
          <li class="d-flex gap-2 align-items-start">
            <i class="bi bi-check2-circle text-brand"></i>
            <span>Micron / temper / coating</span>
          </li>
          <li class="d-flex gap-2 align-items-start">
            <i class="bi bi-check2-circle text-brand"></i>
            <span>Slit width / core ID / max OD</span>
          </li>
          <li class="d-flex gap-2 align-items-start">
            <i class="bi bi-check2-circle text-brand"></i>
            <span>Print colors &amp; registration</span>
          </li>
        </ul>

        <!-- micro trust chips -->
        <div class="d-flex flex-wrap gap-2 mt-4">
          <span class="trust-chip"><i class="bi bi-clock-history"></i> 99.5% On-time</span>
          <span class="trust-chip"><i class="bi bi-shield-check"></i> cGMP aligned</span>
          <span class="trust-chip"><i class="bi bi-recycle"></i> Recyclability first</span>
        </div>
      </div>

      <!-- RIGHT: Form card -->
      <!-- Form -->
            <div class="col-lg-6">
                <div id="mcon-form" class="mcon-form-card rounded-4 shadow-lg border h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h2 class="h4 mb-1">Send us a message</h2>
                            <p class="small text-secondary mb-0">
                                Share your application details, specs or questions — we’ll route it to the right team.
                            </p>
                        </div>

                        <span class="badge rounded-pill mcon-form-badge">
                            <i class="bi bi-mailbox me-1"></i>
                            Enquiry form
                        </span>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success rounded-4 mb-3">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger rounded-4 mb-3">
                            <strong>Please fix these errors:</strong>

                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('enquiry.store') }}">
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">
                                    Name <span class="text-danger">*</span>
                                </label>

                                <div class="mcon-fi">
                                    <i class="bi bi-person"></i>
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control"
                                           placeholder="Your name"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">Company</label>

                                <div class="mcon-fi">
                                    <i class="bi bi-building"></i>
                                    <input type="text"
                                           name="company"
                                           value="{{ old('company') }}"
                                           class="form-control"
                                           placeholder="Company name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">
                                    Work email <span class="text-danger">*</span>
                                </label>

                                <div class="mcon-fi">
                                    <i class="bi bi-envelope"></i>
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control"
                                           placeholder="you@company.com"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">
                                    Phone (with country code)
                                </label>

                                <div class="mcon-fi">
                                    <i class="bi bi-telephone"></i>
                                    <input type="tel"
                                           name="phone"
                                           value="{{ old('phone') }}"
                                           class="form-control"
                                           placeholder="+91 …">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">Industry</label>

                                <div class="mcon-fi">
                                    <i class="bi bi-grid-3x3-gap"></i>
                                    <select name="industry" class="form-select">
                                        <option value="Pharma" {{ old('industry') == 'Pharma' ? 'selected' : '' }}>Pharma</option>
                                        <option value="Food & Dairy" {{ old('industry') == 'Food & Dairy' ? 'selected' : '' }}>Food &amp; Dairy</option>
                                        <option value="Cosmetics" {{ old('industry') == 'Cosmetics' ? 'selected' : '' }}>Cosmetics</option>
                                        <option value="Confectionery" {{ old('industry') == 'Confectionery' ? 'selected' : '' }}>Confectionery</option>
                                        <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">Enquiry type</label>

                                <div class="mcon-fi">
                                    <i class="bi bi-ui-checks-grid"></i>
                                    <select name="enquiry_type" class="form-select">
                                        <option value="General enquiry" {{ old('enquiry_type') == 'General enquiry' ? 'selected' : '' }}>General enquiry</option>
                                        <option value="New project / spec" {{ old('enquiry_type') == 'New project / spec' ? 'selected' : '' }}>New project / spec</option>
                                        <option value="Technical / QA" {{ old('enquiry_type') == 'Technical / QA' ? 'selected' : '' }}>Technical / QA</option>
                                        <option value="Commercial / pricing" {{ old('enquiry_type') == 'Commercial / pricing' ? 'selected' : '' }}>Commercial / pricing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label mcon-form-label">
                                    Message / spec details
                                </label>

                                <div class="mcon-fi mcon-fi-textarea">
                                    <i class="bi bi-journal-text"></i>
                                    <textarea name="message"
                                              class="form-control"
                                              rows="4"
                                              placeholder="Microns, temper, coatings, widths, print, line details…">{{ old('message') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">Target lead time</label>

                                <div class="mcon-fi">
                                    <i class="bi bi-hourglass-split"></i>
                                    <select name="target_lead_time" class="form-select">
                                        <option value="ASAP" {{ old('target_lead_time') == 'ASAP' ? 'selected' : '' }}>ASAP</option>
                                        <option value="2–4 weeks" {{ old('target_lead_time') == '2–4 weeks' ? 'selected' : '' }}>2–4 weeks</option>
                                        <option value="4–6 weeks" {{ old('target_lead_time') == '4–6 weeks' ? 'selected' : '' }}>4–6 weeks</option>
                                        <option value="Flexible" {{ old('target_lead_time') == 'Flexible' ? 'selected' : '' }}>Flexible</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mcon-form-label">Expected annual volume</label>

                                <div class="mcon-fi">
                                    <i class="bi bi-diagram-3"></i>
                                    <select name="expected_annual_volume" class="form-select">
                                        <option value="TBD" {{ old('expected_annual_volume') == 'TBD' ? 'selected' : '' }}>TBD</option>
                                        <option value="< 1 ton" {{ old('expected_annual_volume') == '< 1 ton' ? 'selected' : '' }}>&lt; 1 ton</option>
                                        <option value="1–5 tons" {{ old('expected_annual_volume') == '1–5 tons' ? 'selected' : '' }}>1–5 tons</option>
                                        <option value="> 5 tons" {{ old('expected_annual_volume') == '> 5 tons' ? 'selected' : '' }}>&gt; 5 tons</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check mcon-form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="nda_required"
                                           value="1"
                                           id="mconNda"
                                           {{ old('nda_required') ? 'checked' : '' }}>

                                    <label class="form-check-label small" for="mconNda">
                                        I’d like to discuss under NDA.
                                    </label>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-gradient w-100 mt-3 rounded-pill">
                            Submit enquiry
                        </button>

                        <p class="small text-secondary mt-2 mb-0">
                            Your details stay private and are only used to respond to your enquiry.
                        </p>
                    </form>
                </div>
            </div>
    </div>
  </div>
</section>


<!-- ============= Map / Contact Short (Namespaced) ============= -->
@php
    $setting = $websiteSetting ?? \App\Models\WebsiteSetting::active()->latest()->first();

    $siteName = $setting->site_name ?? 'Meraki Foils';

    $email = $setting->email ?? 'info@merakifoils.com';
    $phone = $setting->phone ?? '+91 79034 90845';
    $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);

    $address = $setting->address ?? 'Kh no 577 1012/588 1016/586 913/565/1, Khera Nihla, Himachal Pradesh 174101';

    $mapUrl = $setting->map_url ?? 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3419.3443145117994!2d76.7120315!3d31.0166553!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390559937e444ed3%3A0xc3c35dbc5aeb0f0d!2sMeraki%20Enterprises%20Unit%20ll!5e0!3m2!1sen!2sin!4v1765269827953!5m2!1sen!2sin';

    $workingHours = $setting->working_hours ?? 'Mon–Sat: 9:00–18:00';

    $whatsappNumber = preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? $phone);

    $whatsappUrl = $setting->whatsapp_url
        ?: ($whatsappNumber ? 'https://wa.me/' . $whatsappNumber : '#');
@endphp

@if($setting)
    <section id="contact" class="mf-contact">
        <span class="mf-contact-glow mf-contact-glow-1 d-none d-md-block"></span>
        <span class="mf-contact-glow mf-contact-glow-2 d-none d-md-block"></span>

        <div class="container position-relative">
            <div class="row g-4 align-items-stretch">

                <div class="col-lg-6 d-flex">
                    <div class="mf-contact-mapCard rounded-4 shadow-lg border position-relative overflow-hidden flex-grow-1 h-100">

                        <svg class="mf-contact-mapPattern" viewBox="0 0 400 300" aria-hidden="true">
                            <defs>
                                <pattern id="mfGridDots" width="16" height="16" patternUnits="userSpaceOnUse">
                                    <circle cx="1" cy="1" r="1" fill="#cbd5e1" opacity=".35"/>
                                </pattern>

                                <linearGradient id="mfMapSheen" x1="0" y1="0" x2="1" y2="0">
                                    <stop offset="0%" stop-color="rgba(255,255,255,0)"/>
                                    <stop offset="50%" stop-color="rgba(255,255,255,.55)"/>
                                    <stop offset="100%" stop-color="rgba(255,255,255,0)"/>
                                </linearGradient>
                            </defs>

                            <rect width="100%" height="100%" fill="#eef2f7"/>
                            <rect width="100%" height="100%" fill="url(#mfGridDots)"/>
                            <rect class="mf-contact-mapSheen" width="60%" height="100%" fill="url(#mfMapSheen)" />
                        </svg>

                        <div class="mf-contact-mapEmbed">
                            @if($mapUrl)
                                <iframe
                                    title="{{ $siteName }} - Map"
                                    src="{{ $mapUrl }}"
                                    style="border:0;"
                                    allowfullscreen
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            @endif
                        </div>

                        <div class="mf-contact-mapTicker">
                            <span>{{ $siteName }}</span>
                            <span>Himachal Pradesh</span>
                            <span>Industrial Zone</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex">
                    <div class="mf-contact-card rounded-4 shadow-lg border h-100 w-100 d-flex flex-column">
                        <div class="p-4 p-md-5">
                            <span class="mf-contact-eyebrow d-inline-flex align-items-center gap-2 mb-2">
                                Get in touch
                                <span class="mf-contact-dot"></span>
                            </span>

                            <h3 class="h1 fw-semibold mt-1 mb-3">
                                Contact
                            </h3>

                            <div class="mf-contact-list">

                                @if($address)
                                    <div class="mf-contact-item">
                                        <i class="bi bi-geo-alt-fill"></i>

                                        <div>
                                            <div class="mf-contact-label">Address</div>
                                            <div class="mf-contact-value">
                                                {{ $address }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($email)
                                    <div class="mf-contact-item">
                                        <i class="bi bi-envelope-fill"></i>

                                        <div>
                                            <div class="mf-contact-label">Email</div>
                                            <a href="mailto:{{ $email }}" class="mf-contact-value link-dark">
                                                {{ $email }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($phone)
                                    <div class="mf-contact-item">
                                        <i class="bi bi-telephone-fill"></i>

                                        <div>
                                            <div class="mf-contact-label">Phone</div>
                                            <a href="tel:{{ $cleanPhone }}" class="mf-contact-value link-dark">
                                                {{ $phone }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    @if($whatsappUrl)
                                        <a href="{{ $whatsappUrl }}"
                                           target="_blank"
                                           rel="noopener"
                                           class="btn btn-outline-dark rounded-pill">
                                            <i class="bi bi-whatsapp me-1"></i>
                                            WhatsApp
                                        </a>
                                    @endif

                                    @if($email)
                                        <a href="mailto:{{ $email }}" class="btn mf-btn-gradient rounded-pill">
                                            <i class="bi bi-send-fill me-1"></i>
                                            Email Us
                                        </a>
                                    @endif

                                    <a href="{{ url('/#rfq') }}" class="btn btn-outline-dark rounded-pill">
                                        <i class="bi bi-file-text me-1"></i>
                                        RFQ Form
                                    </a>
                                </div>
                            </div>

                            <div class="mt-4 small text-secondary">
                                @if($workingHours)
                                    <span class="me-3">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $workingHours }}
                                    </span>
                                @endif

                                <span>
                                    <i class="bi bi-shield-check me-1"></i>
                                    cGMP-aligned facility
                                </span>
                            </div>
                        </div>

                        <div class="mf-contact-footer"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif



@endsection