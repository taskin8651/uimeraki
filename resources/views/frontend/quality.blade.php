@extends('frontend.master')

@section('content')
    


<!-- ============= Quality Hero (Unique) ============= -->
<section id="quality" class="mq-hero position-relative">
  <!-- soft glows -->
  <span class="mq-hero-glow mq-hero-glow-1 d-none d-md-block"></span>
  <span class="mq-hero-glow mq-hero-glow-2 d-none d-md-block"></span>
  <div class="mq-hero-grid" aria-hidden="true"></div>

  <div class="container position-relative">
    <div class="row align-items-center g-4 g-lg-5">
      <!-- Left copy -->
      <div class="col-lg-6">
        <div class="d-inline-flex align-items-center gap-2 mb-2 mq-hero-eyebrow">
          <span class="mq-hero-pill">Quality & Compliance</span>
          <span class="mq-hero-dot"></span>
        </div>
        <h1 class="mq-hero-title">
          Controlled processes.<br>
          Documented <span class="mq-hero-gradient">results.</span>
        </h1>
        <p class="mq-hero-sub">
          From incoming coils to finished rolls, every metre is traceable, tested,
          and released under defined quality plans.
        </p>

        <div class="d-flex flex-wrap gap-2 mt-3">
          <span class="mq-hero-chip"><i class="bi bi-clipboard2-check"></i> Batch traceability</span>
          <span class="mq-hero-chip"><i class="bi bi-graph-up-arrow"></i> In-process QA</span>
          <span class="mq-hero-chip"><i class="bi bi-patch-check"></i> Certificates on request</span>
        </div>

        <div class="row g-3 mt-4 mq-hero-metrics">
          <div class="col-4">
            <div class="mq-hero-metric">
              <div class="mq-hero-metric-val">99.5%</div>
              <div class="mq-hero-metric-label">On-time</div>
            </div>
          </div>
          <div class="col-4">
            <div class="mq-hero-metric">
              <div class="mq-hero-metric-val">250+</div>
              <div class="mq-hero-metric-label">Active SKUs</div>
            </div>
          </div>
          <div class="col-4">
            <div class="mq-hero-metric">
              <div class="mq-hero-metric-val">4</div>
              <div class="mq-hero-metric-label">Core industries</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right visual -->
      <div class="col-lg-6">
        <div class="mq-hero-card shadow-lg rounded-4 border position-relative">
          <!-- pattern -->
          <svg class="mq-hero-pattern" viewBox="0 0 400 260" aria-hidden="true">
            <defs>
              <pattern id="mqGridHex" width="20" height="18" patternUnits="userSpaceOnUse">
                <polygon points="10,0 20,5 20,13 10,18 0,13 0,5"
                         fill="none" stroke="#cbd5e1" stroke-opacity=".4" stroke-width="1"/>
              </pattern>
            </defs>
            <rect width="100%" height="100%" fill="#eef2f7"/>
            <rect width="100%" height="100%" fill="url(#mqGridHex)"/>
          </svg>

          <div class="mq-hero-main">
            <div class="mq-hero-main-header">
              <span class="mq-hero-main-label"><i class="bi bi-diagram-3"></i> QA Snapshot</span>
              <span class="mq-hero-main-pill">Pharma-grade focus</span>
            </div>
            <div class="row g-3 mt-1">
              <div class="col-6">
                <div class="mq-hero-main-block">
                  <span class="mq-hero-main-key">Incoming</span>
                  <p class="mq-hero-main-text">CoA capture, lot tagging, base foil verification.</p>
                </div>
              </div>
              <div class="col-6">
                <div class="mq-hero-main-block">
                  <span class="mq-hero-main-key">In-process</span>
                  <p class="mq-hero-main-text">Pinhole checks, gauge control, registration audits.</p>
                </div>
              </div>
              <div class="col-6">
                <div class="mq-hero-main-block">
                  <span class="mq-hero-main-key">Final QA</span>
                  <p class="mq-hero-main-text">Seal/bond strength, WVTR/OTR, print approval.</p>
                </div>
              </div>
              <div class="col-6">
                <div class="mq-hero-main-block">
                  <span class="mq-hero-main-key">Release</span>
                  <p class="mq-hero-main-text">QC release note, packing spec, sample retention.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- floating badge -->
          <div class="mq-hero-badge">
            <i class="bi bi-shield-lock"></i>
            <div>
              <div class="mq-hero-badge-title">Documented SOPs</div>
              <small>Aligned with cGMP expectations.</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============= Quality Pillars ============= -->
<section class="mq-section mq-pillars">
  <div class="container">
    <div class="text-center mb-4 mb-lg-5">
      <span class="mq-sec-eyebrow d-inline-flex align-items-center gap-2">
        Quality system
        <span class="mq-sec-dot"></span>
      </span>
      <h2 class="mq-sec-title mt-2">How we keep every roll consistent</h2>
      <p class="mq-sec-sub mb-0">
        Defined checks at each stage — backed by data, documentation, and training.
      </p>
    </div>

    <div class="row g-4">
      <!-- Pillar 1 -->
      <div class="col-md-4">
        <article class="mq-pillar-card h-100">
          <div class="mq-pillar-icon">
            <i class="bi bi-clipboard2-check"></i>
          </div>
          <h3 class="mq-pillar-title">Structured quality plans</h3>
          <p class="mq-pillar-text">
            Product-wise quality plans cover microns, temper, coatings, pinhole limits,
            print specs and packaging standards.
          </p>
          <ul class="mq-pillar-list">
            <li>Defined control parameters</li>
            <li>Sampling frequencies</li>
            <li>Acceptance criteria</li>
          </ul>
        </article>
      </div>

      <!-- Pillar 2 -->
      <div class="col-md-4">
        <article class="mq-pillar-card h-100">
          <div class="mq-pillar-icon">
            <i class="bi bi-diagram-3"></i>
          </div>
          <h3 class="mq-pillar-title">End-to-end traceability</h3>
          <p class="mq-pillar-text">
            Each coil and roll is tagged from incoming to dispatch, enabling
            backward and forward traceability.
          </p>
          <ul class="mq-pillar-list">
            <li>Lot IDs & coil mapping</li>
            <li>Process & operator tags</li>
            <li>QC decision logs</li>
          </ul>
        </article>
      </div>

      <!-- Pillar 3 -->
      <div class="col-md-4">
        <article class="mq-pillar-card h-100">
          <div class="mq-pillar-icon">
            <i class="bi bi-person-badge"></i>
          </div>
          <h3 class="mq-pillar-title">People & training</h3>
          <p class="mq-pillar-text">
            Operators and QA teams are trained on handling, cleanliness, sampling,
            and documentation discipline.
          </p>
          <ul class="mq-pillar-list">
            <li>Role-wise SOPs</li>
            <li>Training matrices</li>
            <li>Skill assessments</li>
          </ul>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- ============= QA Process Timeline ============= -->
<section class="mq-section mq-process">
  <div class="container">
    <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4 mb-lg-5">
      <div>
        <span class="mq-sec-eyebrow d-inline-flex align-items-center gap-2">
          From coil to carton
          <span class="mq-sec-dot"></span>
        </span>
        <h2 class="mq-sec-title mt-2 mb-2">Quality at every step</h2>
        <p class="mq-sec-sub mb-0">
          A simple four-step view of how specs become qualified product at your line.
        </p>
      </div>
      <div class="mq-process-tag text-muted small">
        <i class="bi bi-info-circle me-1"></i> Steps can be customized per customer SOP.
      </div>
    </div>

    <div class="mq-process-rail">
      <!-- Step 1 -->
      <article class="mq-step">
        <div class="mq-step-badge">
          <span>1</span>
        </div>
        <div class="mq-step-card">
          <div class="mq-step-icon"><i class="bi bi-box-arrow-in-down"></i></div>
          <h3 class="mq-step-title">Incoming</h3>
          <p class="mq-step-text">
            Base foil, inks, and lacquers are checked against CoA and internal standards.
          </p>
          <ul class="mq-step-list">
            <li>Visual & surface checks</li>
            <li>Gauge / thickness sampling</li>
            <li>Documentation review</li>
          </ul>
        </div>
      </article>

      <!-- Step 2 -->
      <article class="mq-step">
        <div class="mq-step-badge">
          <span>2</span>
        </div>
        <div class="mq-step-card">
          <div class="mq-step-icon"><i class="bi bi-printer"></i></div>
          <h3 class="mq-step-title">Printing & coating</h3>
          <p class="mq-step-text">
            Registration, shade, coating weight and laydown are monitored on line.
          </p>
          <ul class="mq-step-list">
            <li>First-off approval</li>
            <li>On-line print audit</li>
            <li>Coating continuity</li>
          </ul>
        </div>
      </article>

      <!-- Step 3 -->
      <article class="mq-step">
        <div class="mq-step-badge">
          <span>3</span>
        </div>
        <div class="mq-step-card">
          <div class="mq-step-icon"><i class="bi bi-scissors"></i></div>
          <h3 class="mq-step-title">Slitting & doctoring</h3>
          <p class="mq-step-text">
            Edges, slit widths and defects are controlled and logged.
          </p>
          <ul class="mq-step-list">
            <li>Width & core checks</li>
            <li>Pinhole sampling</li>
            <li>Defect tagging</li>
          </ul>
        </div>
      </article>

      <!-- Step 4 -->
      <article class="mq-step">
        <div class="mq-step-badge">
          <span>4</span>
        </div>
        <div class="mq-step-card">
          <div class="mq-step-icon"><i class="bi bi-clipboard-check"></i></div>
          <h3 class="mq-step-title">Final QA & dispatch</h3>
          <p class="mq-step-text">
            Samples are tested and only conforming lots are released with documents.
          </p>
          <ul class="mq-step-list">
            <li>Seal/bond tests</li>
            <li>Barrier test coordination</li>
            <li>Release note & CoA</li>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>

@endsection