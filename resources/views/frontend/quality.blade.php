@extends('frontend.master')

@section('title', 'Quality — Meraki Foils')

@section('content')

<!-- ============= Quality Hero Dynamic ============= -->
<section id="quality" class="mq-hero position-relative">
    <span class="mq-hero-glow mq-hero-glow-1 d-none d-md-block"></span>
    <span class="mq-hero-glow mq-hero-glow-2 d-none d-md-block"></span>
    <div class="mq-hero-grid" aria-hidden="true"></div>

    <div class="container position-relative">
        <div class="row align-items-center g-4 g-lg-5">

            <!-- Left copy -->
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center gap-2 mb-2 mq-hero-eyebrow">
                    <span class="mq-hero-pill">
                        {{ $qualityPage->hero_eyebrow ?? 'Quality & Compliance' }}
                    </span>
                    <span class="mq-hero-dot"></span>
                </div>

                <h1 class="mq-hero-title">
                    {{ $qualityPage->hero_title ?? 'Controlled processes.' }}<br>
                    Documented
                    <span class="mq-hero-gradient">
                        {{ $qualityPage->hero_highlight ?? 'results.' }}
                    </span>
                </h1>

                @if($qualityPage->hero_description)
                    <p class="mq-hero-sub">
                        {{ $qualityPage->hero_description }}
                    </p>
                @endif

                @if(count($qualityPage->hero_chips_array))
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        @foreach($qualityPage->hero_chips_array as $chip)
                            <span class="mq-hero-chip">
                                <i class="bi bi-check2-circle"></i>
                                {{ $chip }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div class="row g-3 mt-4 mq-hero-metrics">
                    @if($qualityPage->hero_kpi_1_value || $qualityPage->hero_kpi_1_label)
                        <div class="col-4">
                            <div class="mq-hero-metric">
                                <div class="mq-hero-metric-val">
                                    {{ $qualityPage->hero_kpi_1_value }}
                                </div>
                                <div class="mq-hero-metric-label">
                                    {{ $qualityPage->hero_kpi_1_label }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($qualityPage->hero_kpi_2_value || $qualityPage->hero_kpi_2_label)
                        <div class="col-4">
                            <div class="mq-hero-metric">
                                <div class="mq-hero-metric-val">
                                    {{ $qualityPage->hero_kpi_2_value }}
                                </div>
                                <div class="mq-hero-metric-label">
                                    {{ $qualityPage->hero_kpi_2_label }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($qualityPage->hero_kpi_3_value || $qualityPage->hero_kpi_3_label)
                        <div class="col-4">
                            <div class="mq-hero-metric">
                                <div class="mq-hero-metric-val">
                                    {{ $qualityPage->hero_kpi_3_value }}
                                </div>
                                <div class="mq-hero-metric-label">
                                    {{ $qualityPage->hero_kpi_3_label }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right visual -->
            <div class="col-lg-6">
                <div class="mq-hero-card shadow-lg rounded-4 border position-relative">

                    <svg class="mq-hero-pattern" viewBox="0 0 400 260" aria-hidden="true">
                        <defs>
                            <pattern id="mqGridHex" width="20" height="18" patternUnits="userSpaceOnUse">
                                <polygon points="10,0 20,5 20,13 10,18 0,13 0,5"
                                         fill="none"
                                         stroke="#cbd5e1"
                                         stroke-opacity=".4"
                                         stroke-width="1"/>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="#eef2f7"/>
                        <rect width="100%" height="100%" fill="url(#mqGridHex)"/>
                    </svg>

                    <div class="mq-hero-main">
                        <div class="mq-hero-main-header">
                            <span class="mq-hero-main-label">
                                <i class="bi bi-diagram-3"></i>
                                {{ $qualityPage->snapshot_label ?? 'QA Snapshot' }}
                            </span>

                            @if($qualityPage->snapshot_badge)
                                <span class="mq-hero-main-pill">
                                    {{ $qualityPage->snapshot_badge }}
                                </span>
                            @endif
                        </div>

                        <div class="row g-3 mt-1">
                            @forelse($snapshots as $snapshot)
                                <div class="col-6">
                                    <div class="mq-hero-main-block">
                                        <span class="mq-hero-main-key">
                                            {{ $snapshot->title }}
                                        </span>

                                        @if($snapshot->description)
                                            <p class="mq-hero-main-text">
                                                {{ $snapshot->description }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="mq-hero-main-block">
                                        <span class="mq-hero-main-key">QA Snapshot</span>
                                        <p class="mq-hero-main-text">
                                            Snapshot blocks will appear here after adding data from admin panel.
                                        </p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    @if($qualityPage->floating_badge_title || $qualityPage->floating_badge_text)
                        <div class="mq-hero-badge">
                            <i class="{{ $qualityPage->floating_badge_icon ?: 'bi bi-shield-lock' }}"></i>

                            <div>
                                <div class="mq-hero-badge-title">
                                    {{ $qualityPage->floating_badge_title }}
                                </div>

                                @if($qualityPage->floating_badge_text)
                                    <small>{{ $qualityPage->floating_badge_text }}</small>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>


<!-- ============= Quality Pillars Dynamic ============= -->
<section class="mq-section mq-pillars">
    <div class="container">

        <div class="text-center mb-4 mb-lg-5">
            <span class="mq-sec-eyebrow d-inline-flex align-items-center gap-2">
                {{ $qualityPage->pillar_eyebrow ?? 'Quality system' }}
                <span class="mq-sec-dot"></span>
            </span>

            <h2 class="mq-sec-title mt-2">
                {{ $qualityPage->pillar_title ?? 'How we keep every roll consistent' }}
            </h2>

            @if($qualityPage->pillar_description)
                <p class="mq-sec-sub mb-0">
                    {{ $qualityPage->pillar_description }}
                </p>
            @endif
        </div>

        <div class="row g-4">
            @forelse($pillars as $pillar)
                <div class="col-md-4">
                    <article class="mq-pillar-card h-100">
                        <div class="mq-pillar-icon">
                            <i class="{{ $pillar->icon ?: 'bi bi-clipboard2-check' }}"></i>
                        </div>

                        <h3 class="mq-pillar-title">
                            {{ $pillar->title }}
                        </h3>

                        @if($pillar->description)
                            <p class="mq-pillar-text">
                                {{ $pillar->description }}
                            </p>
                        @endif

                        @if(count($pillar->points_array))
                            <ul class="mq-pillar-list">
                                @foreach($pillar->points_array as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="mq-pillar-card text-center">
                        <h3 class="mq-pillar-title">No quality pillars found</h3>
                        <p class="mq-pillar-text mb-0">
                            Quality pillars will appear here after adding them from admin panel.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>


<!-- ============= QA Process Timeline Dynamic ============= -->
<section class="mq-section mq-process">
    <div class="container">

        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4 mb-lg-5">
            <div>
                <span class="mq-sec-eyebrow d-inline-flex align-items-center gap-2">
                    {{ $qualityPage->process_eyebrow ?? 'From coil to carton' }}
                    <span class="mq-sec-dot"></span>
                </span>

                <h2 class="mq-sec-title mt-2 mb-2">
                    {{ $qualityPage->process_title ?? 'Quality at every step' }}
                </h2>

                @if($qualityPage->process_description)
                    <p class="mq-sec-sub mb-0">
                        {{ $qualityPage->process_description }}
                    </p>
                @endif
            </div>

            @if($qualityPage->process_note)
                <div class="mq-process-tag text-muted small">
                    <i class="bi bi-info-circle me-1"></i>
                    {{ $qualityPage->process_note }}
                </div>
            @endif
        </div>

        <div class="mq-process-rail">
            @forelse($processes as $process)
                <article class="mq-step">
                    <div class="mq-step-badge">
                        <span>{{ $loop->iteration }}</span>
                    </div>

                    <div class="mq-step-card">
                        <div class="mq-step-icon">
                            <i class="{{ $process->icon ?: 'bi bi-clipboard-check' }}"></i>
                        </div>

                        <h3 class="mq-step-title">
                            {{ $process->title }}
                        </h3>

                        @if($process->description)
                            <p class="mq-step-text">
                                {{ $process->description }}
                            </p>
                        @endif

                        @if(count($process->points_array))
                            <ul class="mq-step-list">
                                @foreach($process->points_array as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </article>
            @empty
                <article class="mq-step">
                    <div class="mq-step-badge">
                        <span>1</span>
                    </div>

                    <div class="mq-step-card">
                        <div class="mq-step-icon">
                            <i class="bi bi-info-circle"></i>
                        </div>

                        <h3 class="mq-step-title">No process steps found</h3>
                        <p class="mq-step-text mb-0">
                            Process steps will appear here after adding them from admin panel.
                        </p>
                    </div>
                </article>
            @endforelse
        </div>

    </div>
</section>



<!-- ============= Lab & Testing ============= -->
<section class="mq-section mq-lab">
  <div class="container">
    <div class="row g-4 g-lg-5 align-items-center">
      <div class="col-lg-6">
        <span class="mq-sec-eyebrow d-inline-flex align-items-center gap-2">
          Lab & testing
          <span class="mq-sec-dot"></span>
        </span>
        <h2 class="mq-sec-title mt-2">Testing that supports your validations</h2>
        <p class="mq-sec-sub">
          Our lab capabilities help you qualify, troubleshoot and optimise foil structures
          for your specific forming and sealing windows.
        </p>

        <ul class="mq-lab-list">
          <li>
            <span class="mq-lab-icon"><i class="bi bi-activity"></i></span>
            <div>
              <div class="mq-lab-title">Seal & bond strength</div>
              <small>Standardized methods for blister and strip applications.</small>
            </div>
          </li>
          <li>
            <span class="mq-lab-icon"><i class="bi bi-droplet-half"></i></span>
            <div>
              <div class="mq-lab-title">Barrier parameters</div>
              <small>Support for WVTR/OTR evaluations through partner labs.</small>
            </div>
          </li>
          <li>
            <span class="mq-lab-icon"><i class="bi bi-eyeglasses"></i></span>
            <div>
              <div class="mq-lab-title">Visual & defect analysis</div>
              <small>Pinhole density checks and surface inspection under defined limits.</small>
            </div>
          </li>
          <li>
            <span class="mq-lab-icon"><i class="bi bi-file-earmark-text"></i></span>
            <div>
              <div class="mq-lab-title">Reporting & documentation</div>
              <small>Test reports can be shared with your technical and QA teams.</small>
            </div>
          </li>
        </ul>

        <div class="d-flex flex-wrap gap-2 mt-3">
          <span class="mq-lab-chip"><i class="bi bi-patch-check"></i> Qualification support</span>
          <span class="mq-lab-chip"><i class="bi bi-people"></i> Tech–QA collaboration</span>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="mq-lab-visual rounded-4 shadow-lg border position-relative overflow-hidden">
          <img src="assets/img/quality/lab-overview.png" alt="Quality lab overview" class="w-100 h-100 object-cover">
          <div class="mq-lab-overlay"></div>
          <div class="mq-lab-badge">
            <i class="bi bi-flask"></i>
            <div>
              <div class="mq-lab-badge-title">Application-driven testing</div>
              <small>Focused on real forming & sealing conditions.</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============= Certifications & Compliance Band ============= -->
<section class="mq-section mq-cert">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-5">
        <span class="mq-sec-eyebrow d-inline-flex align-items-center gap-2">
          Compliance
          <span class="mq-sec-dot"></span>
        </span>
        <h2 class="mq-sec-title mt-2">Certifications & standards</h2>
        <p class="mq-sec-sub">
          We align with globally recognised frameworks so your audits and
          vendor qualifications stay straightforward.
        </p>

        <ul class="mq-cert-list">
          <li><i class="bi bi-check2-circle"></i> ISO-aligned quality management systems</li>
          <li><i class="bi bi-check2-circle"></i> cGMP-oriented practices for pharma business</li>
          <li><i class="bi bi-check2-circle"></i> Food safety protocols for food & dairy</li>
          <li><i class="bi bi-check2-circle"></i> Documentation support for audits</li>
        </ul>
      </div>
      <div class="col-lg-7">
        <div class="row g-3 mq-cert-grid">
          <div class="col-6 col-md-3">
            <div class="mq-cert-card">
              <div class="mq-cert-icon"><i class="bi bi-patch-check"></i></div>
              <div class="mq-cert-label">ISO 9001</div>
              <small>Quality systems</small>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="mq-cert-card">
              <div class="mq-cert-icon"><i class="bi bi-shield-check"></i></div>
              <div class="mq-cert-label">FSSC 22000</div>
              <small>Food safety</small>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="mq-cert-card">
              <div class="mq-cert-icon"><i class="bi bi-cpu"></i></div>
              <div class="mq-cert-label">cGMP</div>
              <small>Manufacturing</small>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="mq-cert-card">
              <div class="mq-cert-icon"><i class="bi bi-file-earmark-text"></i></div>
              <div class="mq-cert-label">DMF</div>
              <small>If applicable</small>
            </div>
          </div>
        </div>
        <p class="text-muted small mt-2 mb-0">
          <i class="bi bi-info-circle me-1"></i>
          Exact certificates, scopes and numbers can be shared during evaluations.
        </p>
      </div>
    </div>
  </div>
</section>

@endsection