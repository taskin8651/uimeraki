@extends('frontend.master')

@section('title', 'Capabilities — Meraki Foils')

@section('content')

<!-- =========================
     CAPABILITIES PAGE
     ========================= -->
<main class="capx-page">

    <!-- ===== Hero ===== -->
    <section class="capx-hero">
        <div class="capx-heroGrid"></div>
        <div class="capx-heroSheen"></div>

        <div class="container position-relative">
            <div class="row align-items-center g-4 g-lg-5">

                <div class="col-lg-6">
                    <span class="capx-eyebrow">
                        <span class="capx-dot"></span>
                        {{ $capabilityPage->hero_eyebrow ?? 'Capabilities' }}
                    </span>

                    <h1 class="capx-title display-5 mt-3">
                        {{ $capabilityPage->hero_title ?? 'Converting, printing & finishing—' }}
                        <span class="gradient-text">
                            {{ $capabilityPage->hero_highlight ?? 'built for precision.' }}
                        </span>
                    </h1>

                    @if($capabilityPage->hero_description)
                        <p class="capx-lead lead mt-3">
                            {{ $capabilityPage->hero_description }}
                        </p>
                    @endif

                    <div class="row g-3 mt-4">
                        <div class="col-4">
                            <div class="capx-kpi">
                                <div class="capx-kpiVal">
                                    {{ $capabilityPage->hero_kpi_1_value ?? '6' }}
                                </div>
                                <div class="capx-kpiKey">
                                    {{ $capabilityPage->hero_kpi_1_label ?? 'Print colors' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="capx-kpi">
                                <div class="capx-kpiVal">
                                    {{ $capabilityPage->hero_kpi_2_value ?? '±0.2' }}
                                </div>
                                <div class="capx-kpiKey">
                                    {{ $capabilityPage->hero_kpi_2_label ?? 'Slit tolerance' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="capx-kpi">
                                <div class="capx-kpiVal">
                                    {{ $capabilityPage->hero_kpi_3_value ?? '2–3' }}
                                </div>
                                <div class="capx-kpiKey">
                                    {{ $capabilityPage->hero_kpi_3_label ?? 'Laminate ply' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count($capabilityPage->hero_chips_array))
                        <div class="d-flex flex-wrap gap-2 mt-4">
                            @foreach($capabilityPage->hero_chips_array as $chip)
                                <span class="capx-chip">
                                    <i class="bi bi-check2-circle"></i>
                                    {{ $chip }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div class="capx-subnav mt-4">
                        <a href="#capx-capabilities" class="capx-subnavLink">
                            <i class="bi bi-grid-1x2"></i>
                            Capabilities
                        </a>

                        <a href="#capx-specs" class="capx-subnavLink">
                            <i class="bi bi-table"></i>
                            Specs
                        </a>

                        <a href="#capx-process" class="capx-subnavLink">
                            <i class="bi bi-diagram-3"></i>
                            Process
                        </a>

                        <a href="#capx-cta" class="capx-subnavLink">
                            <i class="bi bi-file-text"></i>
                            RFQ
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="capx-viz ratio ratio-16x9">
                        <img src="{{ $capabilityPage->hero_image_url }}"
                             alt="{{ $capabilityPage->hero_eyebrow ?? 'Capabilities' }}"
                             class="w-100 h-100"
                             style="object-fit:cover;">

                        <span class="capx-vizLabel">
                            <i class="bi bi-activity me-1"></i>
                            {{ $capabilityPage->hero_visual_label ?? 'Inline QA' }}
                        </span>

                        <div class="capx-floatTile t1 d-none d-md-block">
                            <img src="{{ $capabilityPage->float_image_1_url }}" alt="Capability float image 1">
                        </div>

                        <div class="capx-floatTile t2 d-none d-md-block">
                            <img src="{{ $capabilityPage->float_image_2_url }}" alt="Capability float image 2">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== Capability Cards ===== -->
    <section id="capx-capabilities" class="section bg-light">
        <div class="container">

            <div class="capx-sectionHead text-center mb-4 mb-lg-5">
                <span class="capx-eyebrow">
                    <span class="capx-dot"></span>
                    Core Capabilities
                </span>

                <h2 class="display-6 fw-semibold mt-2">
                    Manufacturing capability built around performance.
                </h2>

                <p class="text-secondary mb-0">
                    Explore our converting, printing, coating, lamination, slitting and QA capabilities.
                </p>
            </div>

            <div class="row g-4">
                @forelse($capabilities as $capability)
                    <div class="col-sm-6 col-lg-4">
                        <article class="capx-card">

                            <div class="capx-cardMedia">
                                <div class="ratio ratio-16x9">
                                    <img src="{{ $capability->image_url }}"
                                         alt="{{ $capability->title }}"
                                         class="w-100 h-100">
                                </div>

                                @if($capability->badge_text)
                                    <span class="capx-badge">
                                        @if($capability->badge_icon)
                                            <i class="{{ $capability->badge_icon }}"></i>
                                        @else
                                            <i class="bi bi-check2-circle"></i>
                                        @endif
                                        {{ $capability->badge_text }}
                                    </span>
                                @endif

                                <span class="capx-cardSheen"></span>
                            </div>

                            <div class="capx-cardBody">
                                <h3 class="h5 mb-2">
                                    {{ $capability->title }}
                                </h3>

                                @if($capability->description)
                                    <p class="text-secondary small mb-3">
                                        {{ $capability->description }}
                                    </p>
                                @endif

                                @if(count($capability->tags_array))
                                    <div class="capx-tags">
                                        @foreach($capability->tags_array as $tag)
                                            <span class="capx-tag">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="prdx-miniCta text-center">
                            <h3 class="fw-semibold mb-2">No capabilities available</h3>
                            <p class="text-secondary mb-0">
                                Capabilities will appear here after adding them from admin panel.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- ===== Specs Table ===== -->
    <section id="capx-specs" class="section">
        <div class="container">

            <div class="capx-sectionHead text-center mb-4">
                <span class="capx-eyebrow">
                    <span class="capx-dot"></span>
                    {{ $capabilityPage->specs_eyebrow ?? 'Technical range' }}
                </span>

                <h2 class="h3 fw-semibold mt-2">
                    {{ $capabilityPage->specs_title ?? 'Capability Specifications' }}
                </h2>

                @if($capabilityPage->specs_description)
                    <p class="text-secondary mb-0">
                        {{ $capabilityPage->specs_description }}
                    </p>
                @endif
            </div>

            <div class="table-responsive capx-specsTable">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Process</th>
                            <th>Range / Detail</th>
                            <th>Notes</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($specs as $spec)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if($spec->icon)
                                            <i class="{{ $spec->icon }}"></i>
                                        @else
                                            <i class="bi bi-gear"></i>
                                        @endif

                                        <strong>{{ $spec->process }}</strong>
                                    </div>
                                </td>

                                <td>
                                    {{ $spec->range_detail ?? '—' }}
                                </td>

                                <td>
                                    {{ $spec->notes ?? '—' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-secondary py-4">
                                    No capability specs added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($capabilityPage->specs_button_text)
                <div class="text-center mt-4">
                    <a href="{{ $capabilityPage->specs_button_link ?: '#capx-cta' }}"
                       class="btn btn-gradient rounded-pill px-4">
                        {{ $capabilityPage->specs_button_text }}
                    </a>
                </div>
            @endif

        </div>
    </section>

    <!-- ===== Process ===== -->
    <section id="capx-process" class="section bg-light">
        <div class="container">

            <div class="capx-sectionHead text-center mb-4 mb-lg-5">
                <span class="capx-eyebrow">
                    <span class="capx-dot"></span>
                    {{ $capabilityPage->process_eyebrow ?? 'How we work' }}
                </span>

                <h2 class="h3 fw-semibold mt-2">
                    {{ $capabilityPage->process_title ?? 'From requirement to reliable supply.' }}
                </h2>

                @if($capabilityPage->process_description)
                    <p class="text-secondary mb-0">
                        {{ $capabilityPage->process_description }}
                    </p>
                @endif
            </div>

            <div class="capx-rail">
                @forelse($processes as $process)
                    <article class="capx-step">
                        <span class="capx-stepNum">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <div class="capx-stepIcon">
                            @if($process->icon)
                                <i class="{{ $process->icon }}"></i>
                            @else
                                <i class="bi bi-check2-circle"></i>
                            @endif
                        </div>

                        <div>
                            <h3 class="h6 mb-1">
                                {{ $process->title }}
                            </h3>

                            @if($process->description)
                                <p class="small text-secondary mb-0">
                                    {{ $process->description }}
                                </p>
                            @endif
                        </div>
                    </article>
                @empty
                    <article class="capx-step">
                        <span class="capx-stepNum">01</span>

                        <div class="capx-stepIcon">
                            <i class="bi bi-chat-dots"></i>
                        </div>

                        <div>
                            <h3 class="h6 mb-1">Consultation</h3>
                            <p class="small text-secondary mb-0">
                                Share your application, packaging target and technical requirements.
                            </p>
                        </div>
                    </article>
                @endforelse
            </div>

        </div>
    </section>

    <!-- ===== CTA / RFQ ===== -->
    <section id="capx-cta" class="section cta position-relative overflow-hidden">
        <span class="cta-glow cta-glow-1 d-none d-md-block"></span>
        <span class="cta-glow cta-glow-2 d-none d-md-block"></span>
        <div class="cta-grid d-none d-lg-block" aria-hidden="true"></div>

        <div class="container position-relative">
            <div class="row g-4 align-items-center">

                 <!-- Form -->
            <div class="col-lg-7">
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

                <div class="col-lg-5 order-1 order-lg-2">
                    <span class="capx-eyebrow text-white-75">
                        <span class="capx-dot"></span>
                        {{ $capabilityPage->cta_eyebrow ?? 'Request a Quote' }}
                    </span>

                    <h2 class="display-6 text-white mt-2 lh-1">
                        {{ $capabilityPage->cta_title ?? 'Need a capability-matched foil solution?' }}
                    </h2>

                    @if($capabilityPage->cta_description)
                        <p class="text-white-75 lead mt-2">
                            {{ $capabilityPage->cta_description }}
                        </p>
                    @endif

                    @if(count($capabilityPage->cta_points_array))
                        <ul class="list-unstyled text-white-75 small d-grid gap-2 mt-3">
                            @foreach($capabilityPage->cta_points_array as $point)
                                <li class="d-flex gap-2 align-items-start">
                                    <i class="bi bi-check2-circle text-brand"></i>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if(count($capabilityPage->cta_trust_chips_array))
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            @foreach($capabilityPage->cta_trust_chips_array as $chip)
                                <span class="trust-chip">
                                    <i class="bi bi-shield-check"></i>
                                    {{ $chip }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

</main>

@endsection