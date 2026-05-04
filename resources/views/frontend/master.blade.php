<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Products — Meraki Foils</title>
  <meta name="description" content="Blister foil, strip foil, lidding foils and custom laminates engineered by spec with tight tolerances and documented QA." />
  <meta name="theme-color" content="#0f172a" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Global site CSS (shared) -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>
<!-- Scope everything with prdx-page -->
<body class="prdx-page">

<!-- ===== Topbar (same as index) ===== -->
<div class="topbar glassy-topbar small text-white">
  <div class="container d-flex align-items-center justify-content-between py-1">
    <div class="d-flex gap-2 overflow-auto small-hide-scroll align-items-center">
      <span class="pill glow">Quality</span>
      <span class="pill glow">Customization</span>
      <span class="pill glow">On-time Delivery</span>
      <span class="pill glow d-none d-md-inline">Sustainability</span>
    </div>
    <div class="d-flex align-items-center gap-3">
      <a class="top-action d-flex align-items-center gap-1" href="mailto:info@merakifoils.com">
        <i class="bi bi-envelope-fill text-gradient"></i>
        <span class="d-none d-sm-inline">info@merakifoils.com</span>
      </a>
      <a class="top-action d-flex align-items-center gap-1" href="tel:+911234567890">
        <i class="bi bi-telephone-fill text-gradient"></i>
        <span class="d-none d-sm-inline">+9179034-90845</span>
      </a>
      <a class="btn btn-sm btn-gradient text-dark fw-semibold rounded-pill px-3 d-none d-md-inline shadow-sm" href="index.html#rfq">
        RFQ
      </a>
    </div>
  </div>
</div>

<!-- ===== Header / Navbar (same as index) ===== -->
<header class="main-header sticky-top">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.html">
        <img src="assets/img/logo.png" alt="Meraki Foils" height="60" class="me-2">
      </a>

      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
        aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list fs-2 text-dark"></i>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="about.html">Company</a></li>
          <li class="nav-item"><a class="nav-link" href="capabilities.html">Capabilities</a></li>
          <li class="nav-item"><a class="nav-link active" href="products.html">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="industries.html">Industries</a></li>
          <li class="nav-item"><a class="nav-link" href="quality.html">Quality</a></li>
          <li class="nav-item"><a class="nav-link" href="resources.html">Resources</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
        </ul>
        <a class="btn btn-gradient rounded-pill px-4 fw-semibold shadow-sm d-none d-md-inline-block" href="index.html#rfq">
          Request a Quote
        </a>
      </div>
    </div>
  </nav>
</header>

<main>


    @yield('content')


    
</main>

<!-- ===== Footer (same as index) ===== -->
<footer class="mf-footer">
  <div class="mf-footer-strip"></div>
  <div class="container position-relative">
    <span class="mf-footer-glow mf-footer-glow-1 d-none d-md-block"></span>
    <span class="mf-footer-glow mf-footer-glow-2 d-none d-md-block"></span>

    <div class="row g-4 g-lg-5 align-items-start">
      <div class="col-md-5">
        <div class="d-flex align-items-center gap-2 mb-2">
          <img src="assets/img/logo.png" alt="Meraki Foils" height="38" class="mf-footer-logo">
          
        </div>
        <p class="mf-footer-text mb-3">
          High-quality aluminium foils engineered for performance & reliability.
        </p>

        <div class="mf-footer-meta">
          <div class="mf-footer-meta-item">
            <i class="bi bi-geo-alt-fill"></i>
            <span> Kh no 577 1012/588 1016/586 913/565/1, Khera Nihla, Himachal Pradesh 174101</span>
          </div>
          <div class="mf-footer-meta-item">
            <i class="bi bi-envelope-fill"></i>
            <a href="mailto:info@merakifoils.com">info@merakifoils.com</a>
          </div>
          <div class="mf-footer-meta-item">
            <i class="bi bi-telephone-fill"></i>
            <a href="tel:+917903490845">+91 79034 90845</a>
          </div>
        </div>

        <div class="d-flex gap-2 mt-3">
          <a href="#" class="mf-footer-social" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
          <a href="#" class="mf-footer-social" aria-label="Twitter/X"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="mf-footer-social" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        </div>
      </div>

      <div class="col-6 col-md-2">
        <h6 class="mf-footer-head">Explore</h6>
        <ul class="mf-footer-links">
          <li><a href="products.html">Products</a></li>
          <li><a href="industries.html">Industries</a></li>
          <li><a href="quality.html">Quality</a></li>
          <li><a href="resources.html">Resources</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2">
        <h6 class="mf-footer-head">Company</h6>
        <ul class="mf-footer-links">
          <li><a href="about.html">About</a></li>
          <li><a href="capabilities.html">Capabilities</a></li>
          <li><a href="index.html#rfq">Request a Quote</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>

      <div class="col-md-3">
        <h6 class="mf-footer-head">Newsletter</h6>
        <p class="mf-footer-note">Get product updates & technical notes.</p>
        <form class="mf-footer-newsletter" onsubmit="event.preventDefault()">
          <input type="email" class="mf-footer-input" placeholder="Email address" required>
          <button class="mf-footer-btn">Join</button>
        </form>
        <p class="mf-footer-micro mb-0 mt-2">We respect your privacy.</p>
      </div>
    </div>

    <hr class="mf-footer-hr">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
      <div class="mf-footer-micro">© <span id="year"></span> Meraki Foils. All rights reserved.</div>
      <div class="d-flex gap-3">
        <a href="#" class="mf-footer-minilink">Privacy</a>
        <a href="#" class="mf-footer-minilink">Terms</a>
      </div>
    </div>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>