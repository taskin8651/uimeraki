@extends('frontend.master')

@section('content')


  <!-- ============= Industries Hero (Unique for this page) ============= -->
  <section class="ind-hero">
    <div class="ind-heroGrid"></div>
    <div class="container position-relative">
      <div class="row align-items-center g-4 g-lg-5">
        <!-- Copy -->
        <div class="col-lg-6">
          <span class="ind-eyebrow">
            Industries We Serve
            <span class="ind-dot"></span>
          </span>
          <h1 class="ind-title display-5 mt-2">
            Foils tailored<br class="d-none d-md-inline">
            for <span class="gradient-text">every sector.</span>
          </h1>
          <p class="ind-lead mt-2">
            Precision-engineered aluminium foils for pharmaceuticals, food &amp; dairy, cosmetics, and confectionery—each optimised for barrier, print, and seal.
          </p>

          <div class="d-flex flex-wrap gap-2 mt-3">
            <span class="ind-chip"><i class="bi bi-capsule-pill"></i><span>Pharma</span></span>
            <span class="ind-chip"><i class="bi bi-basket2"></i><span>Food &amp; Dairy</span></span>
            <span class="ind-chip"><i class="bi bi-brush"></i><span>Cosmetics</span></span>
            <span class="ind-chip"><i class="bi bi-cup-hot"></i><span>Confectionery</span></span>
          </div>
        </div>

        <!-- Visual -->
        <div class="col-lg-6">
          <div class="ratio ratio-16x9 rounded-4 overflow-hidden border border-light-subtle">
            <img src="assets/img/industries/hero.png" alt="Industries overview" class="object-cover w-100 h-100">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ============= Industries Grid ============= -->
  <section id="industries" class="section bg-light">
    <div class="container">
      <!-- Head -->
      <div class="ind-sectionHead text-center mb-4 mb-lg-5">
        <span class="ind-eyebrow d-inline-flex align-items-center justify-content-center gap-2">
          Applications
          <span class="ind-dot"></span>
        </span>
        <h2 class="display-6 fw-semibold mt-2">Industries We Serve</h2>
        <p class="text-secondary mb-0">Diverse markets, one trusted material.</p>
      </div>

      <!-- Grid -->
      <div class="row g-4">
        <!-- Pharma -->
        <div class="col-sm-6 col-lg-3">
          <article class="ind-card h-100">
            <div class="ind-cardMedia">
              <div class="ratio ratio-1x1">
                <img src="assets/img/industries/pharma.png" alt="Pharmaceuticals" class="w-100 h-100 object-cover">
              </div>
              <span class="ind-badge"><i class="bi bi-capsule-pill me-1"></i>Pharma</span>
              <span class="ind-sheen"></span>
            </div>
            <div class="ind-cardBody">
              <h3 class="h5 mb-1">Pharmaceuticals</h3>
              <p class="text-secondary small mb-2">
                Blister &amp; strip foils designed for moisture, light and oxygen barrier with consistent sealability.
              </p>
              <div class="ind-tags">
                <span class="ind-tag">Hard/Soft alu</span>
                <span class="ind-tag">20–30µ</span>
                <span class="ind-tag">cGMP aligned</span>
              </div>
            </div>
          </article>
        </div>

        <!-- Food & Dairy -->
        <div class="col-sm-6 col-lg-3">
          <article class="ind-card h-100">
            <div class="ind-cardMedia">
              <div class="ratio ratio-1x1">
                <img src="assets/img/industries/food-dairy.png" alt="Food and Dairy" class="w-100 h-100 object-cover">
              </div>
              <span class="ind-badge"><i class="bi bi-basket2 me-1"></i>Food &amp; Dairy</span>
              <span class="ind-sheen"></span>
            </div>
            <div class="ind-cardBody">
              <h3 class="h5 mb-1">Food &amp; Dairy</h3>
              <p class="text-secondary small mb-2">
                Lidding foils for cups, tubs &amp; trays with tuned peel, seal and hygiene performance.
              </p>
              <div class="ind-tags">
                <span class="ind-tag">HSL / Primer</span>
                <span class="ind-tag">Emboss / print</span>
                <span class="ind-tag">High barrier</span>
              </div>
            </div>
          </article>
        </div>

        <!-- Cosmetics -->
        <div class="col-sm-6 col-lg-3">
          <article class="ind-card h-100">
            <div class="ind-cardMedia">
              <div class="ratio ratio-1x1">
                <img src="assets/img/industries/cosmetics.png" alt="Cosmetics" class="w-100 h-100 object-cover">
              </div>
              <span class="ind-badge"><i class="bi bi-brush me-1"></i>Cosmetics</span>
              <span class="ind-sheen"></span>
            </div>
            <div class="ind-cardBody">
              <h3 class="h5 mb-1">Cosmetics</h3>
              <p class="text-secondary small mb-2">
                Sachets &amp; closures with premium finishes, barrier, and compatibility with aggressive formulations.
              </p>
              <div class="ind-tags">
                <span class="ind-tag">2–3 ply</span>
                <span class="ind-tag">Foil + films</span>
                <span class="ind-tag">Custom widths</span>
              </div>
            </div>
          </article>
        </div>

        <!-- Confectionery -->
        <div class="col-sm-6 col-lg-3">
          <article class="ind-card h-100">
            <div class="ind-cardMedia">
              <div class="ratio ratio-1x1">
                <img src="assets/img/industries/chocolate.png" alt="Confectionery" class="w-100 h-100 object-cover">
              </div>
              <span class="ind-badge"><i class="bi bi-cup-hot me-1"></i>Confectionery</span>
              <span class="ind-sheen"></span>
            </div>
            <div class="ind-cardBody">
              <h3 class="h5 mb-1">Confectionery</h3>
              <p class="text-secondary small mb-2">
                Wraps &amp; laminates for chocolates and sweets, balancing twist, barrier and shelf appeal.
              </p>
              <div class="ind-tags">
                <span class="ind-tag">Wraps</span>
                <span class="ind-tag">Emboss options</span>
                <span class="ind-tag">Print up to 6 colors</span>
              </div>
            </div>
          </article>
        </div>
      </div>

    
    </div>
  </section>

    <!-- Highlight strip -->
      <div class="ind-highlight mt-5">
        <div class="row align-items-center g-3">
          <div class="col-lg-8">
            <h4 class="fw-semibold mb-1">Have a niche application?</h4>
            <p class="text-secondary mb-0">
              We also co-develop foil structures for medical devices, nutraceuticals, specialty foods and more.
            </p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="index.html#rfq" class="btn btn-gradient rounded-pill px-4">
              Discuss Your Application
            </a>
          </div>
        </div>
      </div>



  <!-- ============= RFQ / Contact CTA (same as index) ============= -->
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
        <div class="col-lg-7">
          <form class="rfq-card glass p-4 p-md-5 rounded-4 shadow-lg" onsubmit="event.preventDefault()">
            <!-- header: steps -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
              <div class="d-flex align-items-center gap-2 rfq-steps">
                <span class="rfq-step active"><span class="dot"></span> Spec</span>
                <span class="rfq-divider"></span>
                <span class="rfq-step"><span class="dot"></span> Review</span>
                <span class="rfq-divider"></span>
                <span class="rfq-step"><span class="dot"></span> Quote</span>
              </div>
              <span class="badge rounded-pill text-dark bg-brand-soft fw-semibold">Average reply &lt; 24h</span>
            </div>

            <div class="row g-3">
              <!-- Name -->
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <div class="fi">
                  <i class="bi bi-person"></i>
                  <input type="text" class="form-control" placeholder="Your name" required>
                </div>
              </div>
              <!-- Company -->
              <div class="col-md-6">
                <label class="form-label">Company</label>
                <div class="fi">
                  <i class="bi bi-building"></i>
                  <input type="text" class="form-control" placeholder="Company name">
                </div>
              </div>
              <!-- Email -->
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <div class="fi">
                  <i class="bi bi-envelope"></i>
                  <input type="email" class="form-control" placeholder="you@company.com" required>
                </div>
              </div>
              <!-- Phone -->
              <div class="col-md-6">
                <label class="form-label">Phone</label>
                <div class="fi">
                  <i class="bi bi-telephone"></i>
                  <input type="tel" class="form-control" placeholder="+91 …">
                </div>
              </div>

              <!-- Spec -->
              <div class="col-12">
                <label class="form-label">Spec / Message</label>
                <div class="fi fi-textarea">
                  <i class="bi bi-journal-text"></i>
                  <textarea class="form-control" rows="4" placeholder="Microns, temper, coatings, widths, prints, volumes…"></textarea>
                </div>
              </div>

              <!-- Selects -->
              <div class="col-md-4">
                <label class="form-label">Industry</label>
                <div class="fi">
                  <i class="bi bi-grid-3x3-gap"></i>
                  <select class="form-select">
                    <option>Pharma</option>
                    <option>Food &amp; Dairy</option>
                    <option>Cosmetics</option>
                    <option>Confectionery</option>
                    <option>Other</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label class="form-label">Target lead time</label>
                <div class="fi">
                  <i class="bi bi-hourglass-split"></i>
                  <select class="form-select">
                    <option>ASAP</option>
                    <option>2–4 weeks</option>
                    <option>4–6 weeks</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label class="form-label">Annual volume</label>
                <div class="fi">
                  <i class="bi bi-diagram-3"></i>
                  <select class="form-select">
                    <option>TBD</option>
                    <option>&lt; 1 ton</option>
                    <option>1–5 tons</option>
                    <option>&gt; 5 tons</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Submit -->
            <button class="btn btn-gradient w-100 mt-3">Submit RFQ</button>
            <p class="text-muted small mt-2 mb-0">This is a static demo form.</p>

            <!-- bottom note / mini-privacy -->
            <div class="d-flex align-items-center gap-2 mt-3 text-secondary small">
              <i class="bi bi-lock"></i> Your details stay private. We only use them to prepare your quote.
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <!-- ============= Map / Contact Short (same as index) ============= -->
  <section id="contact" class="mf-contact">
    <!-- soft background glows -->
    <span class="mf-contact-glow mf-contact-glow-1 d-none d-md-block"></span>
    <span class="mf-contact-glow mf-contact-glow-2 d-none d-md-block"></span>

    <div class="container position-relative">
      <div class="row g-4 align-items-stretch">
        <!-- Map -->
        <div class="col-lg-6 d-flex">
          <div class="mf-contact-mapCard rounded-4 shadow-lg border position-relative overflow-hidden flex-grow-1 h-100">
            <!-- decorative foil pattern -->
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

            <!-- Map embed -->
            <div class="mf-contact-mapEmbed">
              <iframe
                title="Uipro Corporation Pvt Ltd - Map"
                src="https://www.google.com/maps?q=Uipro%20Corporation%20Pvt%20Ltd&output=embed"
                style="border:0;" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- optional ticker -->
            <div class="mf-contact-mapTicker">
              <span>Uipro Corporation Pvt Ltd</span>
              <span>Solan, Himachal Pradesh</span>
              <span>Industrial Zone</span>
            </div>
          </div>
        </div>

        <!-- Contact -->
        <div class="col-lg-6 d-flex">
          <div class="mf-contact-card rounded-4 shadow-lg border h-100 w-100 d-flex flex-column">
            <div class="p-4 p-md-5">
              <span class="mf-contact-eyebrow d-inline-flex align-items-center gap-2 mb-2">
                Get in touch
                <span class="mf-contact-dot"></span>
              </span>
              <h3 class="h1 fw-semibold mt-1 mb-3">Contact</h3>

              <div class="mf-contact-list">
                <div class="mf-contact-item">
                  <i class="bi bi-geo-alt-fill"></i>
                  <div>
                    <div class="mf-contact-label">Address</div>
                    <div class="mf-contact-value"> Kh no 577 1012/588 1016/586 913/565/1, Khera Nihla, Himachal Pradesh 174101</div>
                  </div>
                </div>

                <div class="mf-contact-item">
                  <i class="bi bi-envelope-fill"></i>
                  <div>
                    <div class="mf-contact-label">Email</div>
                    <a href="mailto:info@merakifoils.com" class="mf-contact-value link-dark">info@merakifoils.com</a>
                  </div>
                </div>

                <div class="mf-contact-item">
                  <i class="bi bi-telephone-fill"></i>
                  <div>
                    <div class="mf-contact-label">Phone</div>
                    <a href="tel:+917903490845" class="mf-contact-value link-dark">+91 79034 90845</a>
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mt-3">
                  <a href="https://wa.me/91XXXXXXXXXX" target="_blank" class="btn btn-outline-dark rounded-pill">
                    <i class="bi bi-whatsapp me-1"></i> WhatsApp
                  </a>
                  <a href="mailto:info@merakifoils.com" class="btn mf-btn-gradient rounded-pill">
                    <i class="bi bi-send-fill me-1"></i> Email Us
                  </a>
                  <a href="#rfq" class="btn btn-outline-dark rounded-pill">
                    <i class="bi bi-file-text me-1"></i> RFQ Form
                  </a>
                </div>
              </div>

              <div class="mt-4 small text-secondary">
                <span class="me-3"><i class="bi bi-clock me-1"></i> Mon–Sat: 9:00–18:00</span>
                <span><i class="bi bi-shield-check me-1"></i> cGMP-aligned facility</span>
              </div>
            </div>

            <div class="mf-contact-footer"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection