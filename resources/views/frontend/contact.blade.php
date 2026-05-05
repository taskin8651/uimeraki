@extends('frontend.master')

@section('content')
   
@php
    $setting = $websiteSetting ?? \App\Models\WebsiteSetting::active()->latest()->first();

    $email = $setting->email ?? 'info@merakifoils.com';
    $phone = $setting->phone ?? '+91 79034 90845';
    $address = $setting->address ?? 'Kh no 577 1012/588 1016/586 913/565/1, Khera Nihla, Himachal Pradesh 174101';
    $workingHours = $setting->working_hours ?? 'Mon–Sat: 9:00–18:00 · Closed on public holidays.';
    $mapUrl = $setting->map_url ?? 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3419.3443145117994!2d76.7120315!3d31.0166553!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390559937e444ed3%3A0xc3c35dbc5aeb0f0d!2sMeraki%20Enterprises%20Unit%20ll!5e0!3m2!1sen!2sin!4v1765269827953!5m2!1sen!2sin';

    $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);
    $whatsappNumber = preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? $phone);
@endphp

<!-- ============= Contact Hero ============= -->
<section class="mcon-hero position-relative overflow-hidden">
    <span class="mcon-hero-glow mcon-hero-glow-1 d-none d-md-block" aria-hidden="true"></span>
    <span class="mcon-hero-glow mcon-hero-glow-2 d-none d-md-block" aria-hidden="true"></span>
    <div class="mcon-hero-grid d-none d-lg-block" aria-hidden="true"></div>

    <div class="container position-relative">
        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-lg-7">
                <span class="eyebrow d-inline-flex align-items-center gap-2 mcon-eyebrow-dark">
                    Contact &amp; Enquiries
                    <span class="mcon-dot"></span>
                </span>

                <h1 class="mcon-hero-title mt-3">
                    Let’s discuss specifications, trials and supply for your next project.
                </h1>

                <p class="mcon-hero-subtext mt-2 mb-3">
                    Whether you’re qualifying a new pharma blister foil, exploring lidding for food &amp; dairy,
                    or troubleshooting sealing issues — our team is ready to help.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-3 mcon-hero-badges">
                    <div class="mcon-hero-pill">
                        <i class="bi bi-clock-history"></i>
                        <div>
                            <div class="mcon-hero-pill-title">Response time</div>
                            <small>&lt; 24 business hours</small>
                        </div>
                    </div>

                    <div class="mcon-hero-pill">
                        <i class="bi bi-people"></i>
                        <div>
                            <div class="mcon-hero-pill-title">Who we support</div>
                            <small>Procurement · Packaging · QA</small>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#mcon-form" class="btn btn-gradient rounded-pill px-4">
                        Send an enquiry
                    </a>

                    <a href="{{ url('/#rfq') }}" class="btn btn-outline-light rounded-pill px-4">
                        Request a quote
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="mcon-hero-card rounded-4 shadow-lg border">
                    <h2 class="h5 mb-3 d-flex align-items-center gap-2">
                        <span class="mcon-hero-card-dot"></span>
                        Quick contact
                    </h2>

                    <div class="mcon-hero-contact-list">

                        @if($email)
                            <div class="mcon-hero-contact-item">
                                <i class="bi bi-envelope-fill"></i>
                                <div>
                                    <div class="mcon-hero-label">Email</div>
                                    <a href="mailto:{{ $email }}" class="mcon-hero-value">
                                        {{ $email }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if($phone)
                            <div class="mcon-hero-contact-item">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <div class="mcon-hero-label">Phone</div>
                                    <a href="tel:{{ $cleanPhone }}" class="mcon-hero-value">
                                        {{ $phone }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if($address)
                            <div class="mcon-hero-contact-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <div>
                                    <div class="mcon-hero-label">Address</div>
                                    <div class="mcon-hero-value">
                                        {{ $address }}
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="d-flex flex-wrap gap-2 mt-3">
                        @if($whatsappNumber)
                            <a href="https://wa.me/{{ $whatsappNumber }}"
                               target="_blank"
                               class="btn btn-outline-dark btn-sm rounded-pill">
                                <i class="bi bi-whatsapp me-1"></i>
                                WhatsApp
                            </a>
                        @endif

                        @if($email)
                            <a href="mailto:{{ $email }}" class="btn btn-outline-dark btn-sm rounded-pill">
                                <i class="bi bi-send-fill me-1"></i>
                                Email us
                            </a>
                        @endif
                    </div>

                    @if($workingHours)
                        <p class="small text-secondary mt-3 mb-0">
                            <i class="bi bi-clock me-1"></i>
                            {{ $workingHours }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ============= Main Contact + Map ============= -->
<section class="mcon-main">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-stretch">

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

            <!-- Map + location -->
            <div class="col-lg-6">
                <div class="mcon-mapCard rounded-4 shadow-lg border position-relative overflow-hidden h-100">

                    <svg class="mcon-mapPattern" viewBox="0 0 400 300" aria-hidden="true">
                        <defs>
                            <pattern id="mconGridDots" width="16" height="16" patternUnits="userSpaceOnUse">
                                <circle cx="1" cy="1" r="1" fill="#cbd5e1" opacity=".35"/>
                            </pattern>

                            <linearGradient id="mconMapSheen" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0%" stop-color="rgba(255,255,255,0)"/>
                                <stop offset="50%" stop-color="rgba(255,255,255,.55)"/>
                                <stop offset="100%" stop-color="rgba(255,255,255,0)"/>
                            </linearGradient>
                        </defs>

                        <rect width="100%" height="100%" fill="#eef2f7"/>
                        <rect width="100%" height="100%" fill="url(#mconGridDots)"/>
                        <rect class="mcon-mapSheen" width="60%" height="100%" fill="url(#mconMapSheen)" />
                    </svg>

                    <div class="mcon-mapEmbed">
                        @if($mapUrl)
                            <iframe
                                title="{{ $setting->site_name ?? 'Meraki Foils' }} - Map"
                                src="{{ $mapUrl }}"
                                style="border:0;"
                                allowfullscreen
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        @endif
                    </div>

                    <div class="mcon-mapTicker">
                        <span>{{ $setting->site_name ?? 'Meraki Foils' }}</span>
                        <span>Himachal Pradesh</span>
                        <span>Industrial Zone</span>
                    </div>

                    <div class="mcon-map-pin">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Primary manufacturing site</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

  <!-- ============= Contact Tiles ============= -->
  <section class="mcon-tiles">
    <div class="container">
      <div class="row g-3 g-md-4">
        <div class="col-md-4">
          <div class="mcon-tile">
            <div class="mcon-tile-icon">
              <i class="bi bi-cash-stack"></i>
            </div>
            <div class="mcon-tile-body">
              <div class="mcon-tile-label">Commercial &amp; RFQs</div>
              <p class="mcon-tile-text">Pricing, lead times, contracts and standard terms.</p>
              <span class="mcon-tile-meta">Handled by sales &amp; commercial team</span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="mcon-tile">
            <div class="mcon-tile-icon">
              <i class="bi bi-clipboard2-check"></i>
            </div>
            <div class="mcon-tile-body">
              <div class="mcon-tile-label">Technical &amp; QA</div>
              <p class="mcon-tile-text">Trials, lab reports, pinholes, sealability and line performance.</p>
              <span class="mcon-tile-meta">Packaging development &amp; QA support</span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="mcon-tile">
            <div class="mcon-tile-icon">
              <i class="bi bi-handshake"></i>
            </div>
            <div class="mcon-tile-body">
              <div class="mcon-tile-label">Partnerships</div>
              <p class="mcon-tile-text">Long-term supply, co-development &amp; distributor queries.</p>
              <span class="mcon-tile-meta">Management &amp; strategic partnerships</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============= FAQ / Help ============= -->
 <section class="mcon-faq">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
                <span class="eyebrow d-inline-flex align-items-center gap-2">
                    Help &amp; FAQs
                    <span class="mcon-dot"></span>
                </span>

                <h2 class="h3 mt-2 mb-2">
                    Common questions before you reach out.
                </h2>

                <p class="text-secondary small mb-3">
                    A few quick answers that might help your team prepare specs and first enquiries.
                </p>

                <ul class="mcon-faq-list list-unstyled mb-0">
                    <li><i class="bi bi-check-circle"></i> Typical minimum order quantities</li>
                    <li><i class="bi bi-check-circle"></i> Lead times for repeat vs. new SKUs</li>
                    <li><i class="bi bi-check-circle"></i> What we need for quoting &amp; trials</li>
                </ul>
            </div>

            <div class="col-lg-7">
                @if(isset($faqs) && $faqs->count())
                    <div class="accordion mcon-accordion" id="mconFaqAccordion">
                        @foreach($faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="mconFaqHeading{{ $faq->id }}">
                                    <button class="accordion-button mcon-accordion-btn {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#mconFaqBody{{ $faq->id }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="mconFaqBody{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>

                                <div id="mconFaqBody{{ $faq->id }}"
                                     class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                     aria-labelledby="mconFaqHeading{{ $faq->id }}"
                                     data-bs-parent="#mconFaqAccordion">
                                    <div class="accordion-body mcon-accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-4 shadow-sm p-4 text-center">
                        <i class="bi bi-question-circle mb-2 d-block" style="font-size:42px;color:#94a3b8;"></i>
                        <h3 class="h5 fw-semibold mb-2">No FAQs added yet</h3>
                        <p class="text-secondary mb-0">
                            FAQs will appear here once added from admin panel.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

  @endsection