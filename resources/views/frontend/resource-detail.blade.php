@extends('frontend.master')

@section('content')

@php
    $categoryName = optional($resource->category)->name ?? 'Resource';
    $typeLabel    = $resource->type_label ?? $categoryName;
    $typeIcon     = $resource->type_icon ?: 'bi bi-journal-text';
    $mainIcon     = $resource->main_icon ?: 'bi bi-file-earmark-text';

    $content = $resource->content;

    /*
     | Agar content me HTML tags hain to HTML render hoga.
     | Agar plain text hai to line-break ke sath show hoga.
    */
    $hasHtmlContent = $content && $content !== strip_tags($content);
@endphp

<!-- ================= RESOURCE DETAIL HERO ================= -->
<section class="resd-hero position-relative overflow-hidden">
    <span class="resd-glow resd-glow-1"></span>
    <span class="resd-glow resd-glow-2"></span>
    <div class="resd-grid" aria-hidden="true"></div>

    <div class="container position-relative">
        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-lg-6">
                <a href="{{ route('resources') }}" class="resd-back-link">
                    <i class="bi bi-arrow-left"></i>
                    Back to resources
                </a>

                <div class="mt-3">
                    <span class="resd-eyebrow">
                        <i class="{{ $typeIcon }}"></i>
                        {{ $typeLabel }}
                    </span>
                </div>

                <h1 class="resd-title mt-3">
                    {{ $resource->title }}
                </h1>

                @if($resource->short_description)
                    <p class="resd-subtitle mt-3">
                        {{ $resource->short_description }}
                    </p>
                @endif

                <div class="resd-meta-row mt-4">
                    @if($resource->read_time)
                        <span class="resd-meta-pill">
                            <i class="bi bi-clock"></i>
                            {{ $resource->read_time }}
                        </span>
                    @endif

                    @if($resource->category)
                        <span class="resd-meta-pill">
                            <i class="{{ $resource->category->icon ?: 'bi bi-folder' }}"></i>
                            {{ $resource->category->name }}
                        </span>
                    @endif

                    @if($resource->industry_or_meta)
                        <span class="resd-meta-pill">
                            <i class="bi bi-diagram-3"></i>
                            {{ $resource->industry_or_meta }}
                        </span>
                    @endif

                    @if($resource->file_url)
                        <span class="resd-meta-pill">
                            <i class="bi bi-download"></i>
                            Downloadable
                        </span>
                    @endif
                </div>

                @if(count($resource->tags_array))
                    <div class="resd-tags mt-4">
                        @foreach($resource->tags_array as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-lg-6">
                <div class="resd-visual">
                    <div class="resd-visual-img">
                        <img src="{{ $resource->image_url }}"
                             alt="{{ $resource->title }}">
                        <span class="resd-shine"></span>
                    </div>

                    <div class="resd-floating-card resd-floating-card-1">
                        <i class="{{ $mainIcon }}"></i>
                        <div>
                            <strong>{{ $typeLabel }}</strong>
                            <small>{{ $categoryName }}</small>
                        </div>
                    </div>

                    @if($resource->read_time)
                        <div class="resd-floating-card resd-floating-card-2">
                            <i class="bi bi-lightning-charge"></i>
                            <div>
                                <strong>Quick Read</strong>
                                <small>{{ $resource->read_time }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ================= RESOURCE DETAIL BODY ================= -->
<section class="resd-body-section">
    <div class="container">
        <div class="row g-4 g-lg-5">

            <!-- MAIN CONTENT -->
            <div class="col-lg-8">
                <article class="resd-content-card">

                    <div class="resd-content-head">
                        <div class="resd-content-icon">
                            <i class="{{ $mainIcon }}"></i>
                        </div>

                        <div>
                            <p class="resd-content-label">Resource Content</p>
                            <h2 class="resd-content-title">{{ $resource->title }}</h2>
                        </div>
                    </div>

                    <div class="resd-divider"></div>

                    <div class="resd-content typography-content">
                        @if($content)
                            @if($hasHtmlContent)
                                {!! $content !!}
                            @else
                                {!! nl2br(e($content)) !!}
                            @endif
                        @elseif($resource->short_description)
                            <p>{{ $resource->short_description }}</p>
                        @else
                            <p>No content available for this resource.</p>
                        @endif
                    </div>

                </article>

                <div class="resd-help-card mt-4">
                    <div>
                        <span class="resd-help-badge">
                            <i class="bi bi-headset"></i>
                            Need expert help?
                        </span>

                        <h3>Need help with aluminium foil specifications?</h3>

                        <p>
                            Our team can recommend the right micron, temper, coating, laminate and print options
                            based on your product application.
                        </p>
                    </div>

                    <a href="{{ url('/contact#rfq') }}" class="btn btn-gradient rounded-pill px-4">
                        Talk to a Specialist
                    </a>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <aside class="resd-sidebar">

                    <div class="resd-side-card">
                        <div class="resd-side-head">
                            <i class="bi bi-info-circle"></i>
                            <span>Resource Summary</span>
                        </div>

                        <div class="resd-side-list">
                            <div class="resd-side-item">
                                <span>Type</span>
                                <strong>{{ $typeLabel }}</strong>
                            </div>

                            <div class="resd-side-item">
                                <span>Category</span>
                                <strong>{{ $categoryName }}</strong>
                            </div>

                            @if($resource->read_time)
                                <div class="resd-side-item">
                                    <span>Read Time</span>
                                    <strong>{{ $resource->read_time }}</strong>
                                </div>
                            @endif

                            @if($resource->industry_or_meta)
                                <div class="resd-side-item">
                                    <span>Meta</span>
                                    <strong>{{ $resource->industry_or_meta }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($resource->file_url)
                        <div class="resd-download-card mt-4">
                            <div class="resd-download-icon">
                                <i class="bi bi-file-earmark-arrow-down"></i>
                            </div>

                            <h3>Download Resource</h3>

                            <p>
                                This resource has an attached file. You can open or download it directly.
                            </p>

                            <a href="{{ $resource->file_url }}"
                               target="_blank"
                               class="btn btn-gradient w-100 rounded-pill">
                                <i class="bi bi-download me-1"></i>
                                {{ $resource->button_text ?? 'Download File' }}
                            </a>
                        </div>
                    @endif

                    @if(count($resource->tags_array))
                        <div class="resd-side-card mt-4">
                            <div class="resd-side-head">
                                <i class="bi bi-tags"></i>
                                <span>Topics</span>
                            </div>

                            <div class="resd-tags resd-tags-side">
                                @foreach($resource->tags_array as $tag)
                                    <a href="{{ route('resources', ['search' => $tag]) }}">
                                        {{ $tag }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </aside>
            </div>

        </div>
    </div>
</section>


@if(isset($relatedResources) && $relatedResources->count())
    <!-- ================= RELATED RESOURCES ================= -->
    <section class="resd-related-section">
        <div class="container">

            <div class="text-center mb-4 mb-lg-5">
                <span class="resd-light-eyebrow">
                    <i class="bi bi-stars"></i>
                    Related Resources
                </span>

                <h2 class="resd-related-title mt-3">
                    More from Knowledge Center
                </h2>

                <p class="text-secondary mb-0">
                    Explore more useful guides, notes and insights.
                </p>
            </div>

            <div class="row g-4">
                @foreach($relatedResources as $item)
                    <div class="col-md-6 col-lg-4">
                        <article class="resd-related-card h-100">

                            <div class="resd-related-media {{ $item->card_color_class }}">
                                <span class="resd-related-type">
                                    <i class="{{ $item->type_icon ?: 'bi bi-journal-text' }}"></i>
                                    {{ $item->type_label ?? optional($item->category)->name ?? 'Resource' }}
                                </span>

                                <div class="resd-related-icon">
                                    <i class="{{ $item->main_icon ?: 'bi bi-file-earmark-text' }}"></i>
                                </div>
                            </div>

                            <div class="resd-related-body">
                                <h3>{{ $item->title }}</h3>

                                @if($item->short_description)
                                    <p>{{ \Illuminate\Support\Str::limit($item->short_description, 110) }}</p>
                                @endif

                                <div class="resd-related-meta">
                                    @if($item->read_time)
                                        <span>
                                            <i class="bi bi-clock"></i>
                                            {{ $item->read_time }}
                                        </span>
                                    @endif

                                    @if($item->category)
                                        <span>
                                            <i class="{{ $item->category->icon ?: 'bi bi-folder' }}"></i>
                                            {{ $item->category->name }}
                                        </span>
                                    @endif
                                </div>

                                <a href="{{ $item->button_link }}"
                                   class="resd-read-link"
                                   @if($item->file_url) target="_blank" @endif>
                                    {{ $item->button_text ?? ($item->file_url ? 'Download File' : 'Read article') }}
                                    <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif


<style>
/* ================= RESOURCE DETAIL PREMIUM CSS ================= */

.resd-hero {
    padding: 86px 0 76px;
    color: #f8fafc;
    background:
        radial-gradient(900px 520px at 0% -10%, rgba(4,148,230,.22), transparent 60%),
        radial-gradient(780px 460px at 105% 10%, rgba(179,32,41,.18), transparent 58%),
        linear-gradient(180deg, #0b1120 0%, #020617 100%);
}

.resd-glow {
    position: absolute;
    border-radius: 999px;
    filter: blur(90px);
    opacity: .42;
    pointer-events: none;
}

.resd-glow-1 {
    width: 520px;
    height: 520px;
    left: -16%;
    top: -22%;
    background: rgba(4,148,230,.45);
}

.resd-glow-2 {
    width: 460px;
    height: 460px;
    right: -12%;
    bottom: -20%;
    background: rgba(179,32,41,.36);
}

.resd-grid {
    position: absolute;
    inset: 0;
    opacity: .22;
    background:
        linear-gradient(rgba(255,255,255,.08) 1px, transparent 1px) 0 0 / 34px 34px,
        linear-gradient(90deg, rgba(255,255,255,.08) 1px, transparent 1px) 0 0 / 34px 34px;
    mask-image: radial-gradient(closest-side at 68% 36%, #000, transparent 72%);
}

.resd-back-link {
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    color: #cbd5e1;
    text-decoration: none;
    font-weight: 700;
    font-size: .9rem;
}

.resd-back-link:hover {
    color: #ffffff;
}

.resd-eyebrow,
.resd-light-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    padding: .45rem .8rem;
    border-radius: 999px;
    font-size: .82rem;
    font-weight: 800;
    letter-spacing: .04em;
    text-transform: uppercase;
}

.resd-eyebrow {
    color: #e2e8f0;
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.16);
}

.resd-light-eyebrow {
    color: #0f172a;
    background: rgba(15,23,42,.04);
    border: 1px solid rgba(15,23,42,.08);
}

.resd-title {
    font-size: clamp(2rem, 3.8vw, 4rem);
    line-height: 1.05;
    font-weight: 900;
    letter-spacing: -.04em;
    max-width: 720px;
}

.resd-subtitle {
    color: #cbd5e1;
    font-size: 1.05rem;
    line-height: 1.8;
    max-width: 620px;
}

.resd-meta-row {
    display: flex;
    flex-wrap: wrap;
    gap: .65rem;
}

.resd-meta-pill {
    display: inline-flex;
    align-items: center;
    gap: .42rem;
    padding: .48rem .8rem;
    border-radius: 999px;
    color: #e5e7eb;
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.14);
    font-size: .85rem;
    font-weight: 700;
}

.resd-tags {
    display: flex;
    flex-wrap: wrap;
    gap: .45rem;
}

.resd-tags span,
.resd-tags a {
    display: inline-flex;
    align-items: center;
    padding: .35rem .7rem;
    border-radius: 999px;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.16);
    color: #f8fafc;
    font-size: .78rem;
    font-weight: 700;
    text-decoration: none;
}

.resd-tags-side a {
    background: #f8fafc;
    border-color: #e2e8f0;
    color: #334155;
}

.resd-visual {
    position: relative;
    min-height: 420px;
    border-radius: 28px;
    padding: 14px;
    background:
        radial-gradient(600px 280px at 80% 0%, rgba(4,148,230,.22), transparent 70%),
        rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.14);
    box-shadow: 0 30px 80px rgba(2,6,23,.45);
}

.resd-visual-img {
    position: relative;
    overflow: hidden;
    border-radius: 22px;
    height: 390px;
    background: #e2e8f0;
    box-shadow: inset 0 1px 0 rgba(255,255,255,.2);
}

.resd-visual-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.resd-shine {
    position: absolute;
    inset: 0;
    background: linear-gradient(110deg, transparent 35%, rgba(255,255,255,.45), transparent 62%);
    transform: translateX(-130%);
    animation: resdShine 5s ease-in-out infinite;
    mix-blend-mode: screen;
}

@keyframes resdShine {
    to { transform: translateX(130%); }
}

.resd-floating-card {
    position: absolute;
    display: flex;
    align-items: center;
    gap: .75rem;
    padding: .75rem .9rem;
    border-radius: 16px;
    background: rgba(255,255,255,.92);
    color: #0f172a;
    border: 1px solid rgba(15,23,42,.08);
    box-shadow: 0 18px 42px rgba(2,6,23,.22);
    backdrop-filter: blur(10px);
}

.resd-floating-card i {
    width: 38px;
    height: 38px;
    display: grid;
    place-items: center;
    border-radius: 12px;
    color: #ffffff;
    background: linear-gradient(135deg, #0284D8, #0494E6, #33B4FF);
}

.resd-floating-card strong {
    display: block;
    font-size: .9rem;
}

.resd-floating-card small {
    display: block;
    color: #64748b;
    font-size: .75rem;
}

.resd-floating-card-1 {
    left: -10px;
    bottom: 34px;
}

.resd-floating-card-2 {
    right: -8px;
    top: 34px;
}

.resd-body-section {
    padding: 72px 0;
    background:
        radial-gradient(800px 420px at 100% -10%, rgba(4,148,230,.10), transparent 65%),
        linear-gradient(180deg, #f8fafc, #eef2f7);
}

.resd-content-card,
.resd-side-card,
.resd-download-card,
.resd-help-card,
.resd-related-card {
    background: #ffffff;
    border: 1px solid rgba(148,163,184,.35);
    box-shadow: 0 18px 45px rgba(15,23,42,.07);
}

.resd-content-card {
    border-radius: 26px;
    padding: 28px;
}

.resd-content-head {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.resd-content-icon {
    width: 54px;
    height: 54px;
    display: grid;
    place-items: center;
    border-radius: 18px;
    color: #ffffff;
    font-size: 1.35rem;
    background: linear-gradient(135deg, #0284D8, #0494E6, #33B4FF);
    box-shadow: 0 16px 34px rgba(4,148,230,.24);
}

.resd-content-label {
    margin: 0;
    color: #64748b;
    font-size: .78rem;
    text-transform: uppercase;
    letter-spacing: .08em;
    font-weight: 800;
}

.resd-content-title {
    margin: .1rem 0 0;
    color: #0f172a;
    font-size: 1.35rem;
    font-weight: 800;
}

.resd-divider {
    height: 1px;
    margin: 24px 0;
    background: linear-gradient(90deg, transparent, rgba(4,148,230,.26), transparent);
}

.typography-content {
    color: #334155;
    font-size: 1rem;
    line-height: 1.85;
}

.typography-content h1,
.typography-content h2,
.typography-content h3,
.typography-content h4 {
    color: #0f172a;
    font-weight: 850;
    margin-top: 1.6rem;
    margin-bottom: .75rem;
}

.typography-content h2 {
    font-size: 1.55rem;
}

.typography-content h3 {
    font-size: 1.25rem;
}

.typography-content p {
    margin-bottom: 1rem;
}

.typography-content ul,
.typography-content ol {
    padding-left: 1.3rem;
    margin-bottom: 1.2rem;
}

.typography-content li {
    margin-bottom: .45rem;
}

.typography-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.4rem 0;
    overflow: hidden;
    border-radius: 14px;
}

.typography-content table th {
    background: #f1f5f9;
    color: #0f172a;
    font-weight: 800;
}

.typography-content table th,
.typography-content table td {
    padding: .8rem .9rem;
    border: 1px solid #e2e8f0;
}

.typography-content blockquote {
    margin: 1.4rem 0;
    padding: 1rem 1.2rem;
    border-left: 4px solid #0494E6;
    background: #f8fafc;
    border-radius: 14px;
    color: #0f172a;
    font-weight: 650;
}

.resd-sidebar {
    position: sticky;
    top: 90px;
}

.resd-side-card,
.resd-download-card {
    border-radius: 22px;
    padding: 22px;
}

.resd-side-head {
    display: flex;
    align-items: center;
    gap: .55rem;
    color: #0f172a;
    font-weight: 850;
    margin-bottom: 1rem;
}

.resd-side-head i {
    color: #0494E6;
}

.resd-side-list {
    display: grid;
    gap: .75rem;
}

.resd-side-item {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    padding-bottom: .75rem;
    border-bottom: 1px dashed #e2e8f0;
}

.resd-side-item:last-child {
    border-bottom: 0;
    padding-bottom: 0;
}

.resd-side-item span {
    color: #64748b;
    font-size: .88rem;
}

.resd-side-item strong {
    color: #0f172a;
    font-size: .9rem;
    text-align: right;
}

.resd-download-card {
    background:
        radial-gradient(420px 220px at 100% 0%, rgba(4,148,230,.16), transparent 70%),
        #ffffff;
}

.resd-download-icon {
    width: 56px;
    height: 56px;
    display: grid;
    place-items: center;
    border-radius: 18px;
    color: #ffffff;
    font-size: 1.45rem;
    background: linear-gradient(135deg, #0284D8, #0494E6, #33B4FF);
}

.resd-download-card h3 {
    margin: 1rem 0 .4rem;
    color: #0f172a;
    font-size: 1.25rem;
    font-weight: 850;
}

.resd-download-card p {
    color: #64748b;
    font-size: .92rem;
}

.resd-help-card {
    border-radius: 24px;
    padding: 26px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    background:
        radial-gradient(560px 260px at 100% 0%, rgba(4,148,230,.14), transparent 65%),
        #ffffff;
}

.resd-help-badge {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    padding: .35rem .7rem;
    border-radius: 999px;
    color: #0f172a;
    background: #eef6ff;
    font-size: .78rem;
    font-weight: 800;
}

.resd-help-card h3 {
    margin: .8rem 0 .35rem;
    color: #0f172a;
    font-size: 1.3rem;
    font-weight: 850;
}

.resd-help-card p {
    margin: 0;
    color: #64748b;
}

.resd-related-section {
    padding: 72px 0;
    background: #ffffff;
}

.resd-related-title {
    font-size: clamp(1.8rem, 3vw, 2.7rem);
    font-weight: 850;
    color: #0f172a;
    letter-spacing: -.03em;
}

.resd-related-card {
    border-radius: 24px;
    overflow: hidden;
    transition: transform .22s ease, box-shadow .22s ease;
}

.resd-related-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 26px 60px rgba(15,23,42,.12);
}

.resd-related-media {
    position: relative;
    height: 150px;
    background: radial-gradient(circle at 0% 0%, #38bdf8, transparent 60%), #020617;
}

.resd-related-type {
    position: absolute;
    left: 14px;
    top: 14px;
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    padding: .32rem .7rem;
    border-radius: 999px;
    color: #ffffff;
    background: rgba(15,23,42,.55);
    border: 1px solid rgba(255,255,255,.25);
    font-size: .78rem;
    font-weight: 800;
}

.resd-related-icon {
    position: absolute;
    right: 18px;
    bottom: 16px;
    width: 46px;
    height: 46px;
    display: grid;
    place-items: center;
    border-radius: 16px;
    color: #ffffff;
    background: rgba(15,23,42,.78);
    box-shadow: 0 12px 30px rgba(2,6,23,.32);
    font-size: 1.35rem;
}

.resd-related-body {
    padding: 20px;
}

.resd-related-body h3 {
    color: #0f172a;
    font-size: 1.08rem;
    font-weight: 850;
    margin-bottom: .5rem;
}

.resd-related-body p {
    color: #64748b;
    font-size: .92rem;
    margin-bottom: .85rem;
}

.resd-related-meta {
    display: flex;
    flex-wrap: wrap;
    gap: .65rem;
    color: #64748b;
    font-size: .8rem;
    margin-bottom: .85rem;
}

.resd-read-link {
    display: inline-flex;
    align-items: center;
    gap: .25rem;
    color: #0494E6;
    font-weight: 800;
    text-decoration: none;
}

.resd-read-link:hover {
    color: #0f172a;
}

@media (max-width: 991.98px) {
    .resd-hero {
        padding: 64px 0 56px;
    }

    .resd-visual {
        min-height: auto;
    }

    .resd-visual-img {
        height: 320px;
    }

    .resd-sidebar {
        position: static;
    }

    .resd-help-card {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 575.98px) {
    .resd-title {
        font-size: 2rem;
    }

    .resd-visual-img {
        height: 260px;
    }

    .resd-floating-card {
        position: static;
        margin-top: .8rem;
    }

    .resd-content-card {
        padding: 20px;
        border-radius: 20px;
    }

    .resd-content-head {
        align-items: flex-start;
    }
}
</style>

@endsection