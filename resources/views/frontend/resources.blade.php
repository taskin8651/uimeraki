@extends('frontend.master')

@section('content')

<!-- ============= Resources Hero Dynamic ============= -->
<section class="mres-hero position-relative overflow-hidden">
    <span class="mres-hero-glow mres-hero-glow-1 d-none d-md-block" aria-hidden="true"></span>
    <span class="mres-hero-glow mres-hero-glow-2 d-none d-md-block" aria-hidden="true"></span>
    <div class="mres-hero-grid d-none d-lg-block" aria-hidden="true"></div>

    <div class="container position-relative">
        <div class="row align-items-center g-4 g-lg-5">

            <!-- Left copy -->
            <div class="col-lg-6">
                <span class="eyebrow d-inline-flex align-items-center gap-2 mres-eyebrow-dark">
                    {{ $resourcePage->hero_eyebrow ?? 'Knowledge Center' }}
                    <span class="mres-dot"></span>
                </span>

                <h1 class="mres-hero-title mt-3">
                    {{ $resourcePage->hero_title ?? 'Guides, technical notes & insights on aluminium foil packaging.' }}
                </h1>

                @if($resourcePage->hero_description)
                    <p class="mres-hero-subtext mt-2 mb-3">
                        {{ $resourcePage->hero_description }}
                    </p>
                @endif

                <!-- Search -->
                <form class="mres-search-wrapper" method="GET" action="{{ route('resources') }}">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    <div class="mres-search-input">
                        <i class="bi bi-search"></i>

                        <input type="search"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control border-0 shadow-none"
                               placeholder="{{ $resourcePage->search_placeholder ?? 'Search by topic, industry or keyword…' }}">
                    </div>

                    <button class="btn btn-gradient mres-search-btn" type="submit">
                        Search
                    </button>
                </form>

                <!-- Quick tags -->
                @if(count($resourcePage->quick_tags_array))
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        @foreach($resourcePage->quick_tags_array as $tag)
                            <a href="{{ route('resources', ['search' => $tag]) }}"
                               class="mres-chip text-decoration-none">
                                {{ $tag }}
                            </a>
                        @endforeach
                    </div>
                @endif

                <!-- Meta stats -->
                <div class="d-flex flex-wrap gap-3 mt-4">
                    @if($resourcePage->meta_1_value || $resourcePage->meta_1_label)
                        <div class="mres-meta-pill">
                            <span class="mres-meta-val">{{ $resourcePage->meta_1_value }}</span>
                            <span class="mres-meta-label">{{ $resourcePage->meta_1_label }}</span>
                        </div>
                    @endif

                    @if($resourcePage->meta_2_value || $resourcePage->meta_2_label)
                        <div class="mres-meta-pill">
                            <span class="mres-meta-val">{{ $resourcePage->meta_2_value }}</span>
                            <span class="mres-meta-label">{{ $resourcePage->meta_2_label }}</span>
                        </div>
                    @endif

                    @if($resourcePage->meta_3_value || $resourcePage->meta_3_label)
                        <div class="mres-meta-pill">
                            <span class="mres-meta-val">{{ $resourcePage->meta_3_value }}</span>
                            <span class="mres-meta-label">{{ $resourcePage->meta_3_label }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Featured Resource -->
            <div class="col-lg-6">
                @if($featuredResource)
                    <article class="mres-feature-card rounded-4 shadow-lg border">
                        <div class="mres-feature-tag">
                            <i class="bi bi-star-fill"></i>
                            {{ $resourcePage->featured_label ?? 'Featured Resource' }}
                        </div>

                        <div class="mres-feature-body">
                            <h2 class="h4 mb-2">
                                {{ $featuredResource->title }}
                            </h2>

                            @if($featuredResource->short_description)
                                <p class="mres-feature-text mb-3">
                                    {{ $featuredResource->short_description }}
                                </p>
                            @endif

                            @if(count($featuredResource->tags_array))
                                <ul class="mres-feature-list">
                                    @foreach($featuredResource->tags_array as $tag)
                                        <li>
                                            <i class="bi bi-check2"></i>
                                            {{ $tag }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="d-flex flex-wrap align-items-center gap-3 mt-3">
                                <a href="{{ $featuredResource->button_link }}"
                                   class="btn btn-gradient btn-sm rounded-pill px-3"
                                   @if($featuredResource->file_url) target="_blank" @endif>
                                    {{ $featuredResource->button_text ?? 'Read the guide' }}
                                </a>

                                <div class="small text-secondary">
                                    @if($featuredResource->read_time)
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $featuredResource->read_time }}
                                    @endif

                                    @if($featuredResource->category)
                                        · {{ $featuredResource->category->name }}
                                    @elseif($featuredResource->industry_or_meta)
                                        · {{ $featuredResource->industry_or_meta }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mres-feature-side d-none d-md-flex">
                            @if($featuredResource->file_url)
                                <div class="mres-feature-pill">
                                    <i class="bi bi-file-earmark-text"></i>
                                    <span>Downloadable File</span>
                                </div>
                            @endif

                            @if($featuredResource->type_label)
                                <div class="mres-feature-pill">
                                    <i class="{{ $featuredResource->type_icon ?: 'bi bi-journal-text' }}"></i>
                                    <span>{{ $featuredResource->type_label }}</span>
                                </div>
                            @endif

                            @if($featuredResource->industry_or_meta)
                                <div class="mres-feature-pill">
                                    <i class="{{ $featuredResource->main_icon ?: 'bi bi-diagram-3' }}"></i>
                                    <span>{{ $featuredResource->industry_or_meta }}</span>
                                </div>
                            @endif
                        </div>
                    </article>
                @else
                    <article class="mres-feature-card rounded-4 shadow-lg border">
                        <div class="mres-feature-tag">
                            <i class="bi bi-star-fill"></i>
                            Featured Resource
                        </div>

                        <div class="mres-feature-body">
                            <h2 class="h4 mb-2">No featured resource found</h2>
                            <p class="mres-feature-text mb-0">
                                Add a featured resource from admin panel.
                            </p>
                        </div>
                    </article>
                @endif
            </div>

        </div>
    </div>
</section>


<!-- ============= Filters + Resource Grid Dynamic ============= -->
<section class="mres-list section">
    <div class="container">

        <!-- Filters -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 mb-lg-5">
            <div class="d-flex flex-wrap gap-2">

                <a href="{{ route('resources', request('search') ? ['search' => request('search')] : []) }}"
                   class="mres-filter-pill text-decoration-none {{ !request('category') || request('category') == 'all' ? 'mres-filter-pill-active' : '' }}">
                    <i class="bi bi-grid-3x3-gap-fill me-1"></i>
                    All
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('resources', array_filter([
                            'category' => $category->slug,
                            'search'   => request('search'),
                        ])) }}"
                       class="mres-filter-pill text-decoration-none {{ request('category') == $category->slug ? 'mres-filter-pill-active' : '' }}">
                        @if($category->icon)
                            <i class="{{ $category->icon }} me-1"></i>
                        @endif
                        {{ $category->name }}
                    </a>
                @endforeach

            </div>

            <div class="d-flex align-items-center gap-2">
                <span class="small text-secondary">
                    {{ $resources->total() }} Resources
                </span>
            </div>
        </div>

        @if(request('search') || request('category'))
            <div class="mb-4">
                <a href="{{ route('resources') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                    <i class="bi bi-x-circle me-1"></i>
                    Clear Filter
                </a>
            </div>
        @endif

        <!-- Grid -->
        <div class="row g-4">
            @forelse($resources as $resource)
                <div class="col-md-6 col-lg-4">
                    <article class="mres-card h-100">

                        <div class="mres-card-media {{ $resource->getFirstMediaUrl('resource_image') ? 'has-image' : $resource->card_color_class }}">

    @if($resource->getFirstMediaUrl('resource_image'))
        <img src="{{ $resource->image_url }}"
             alt="{{ $resource->title }}"
             class="mres-card-img">
        <span class="mres-card-img-overlay"></span>
    @endif

    <span class="mres-card-type">
        <i class="{{ $resource->type_icon ?: 'bi bi-journal-text' }}"></i>
        {{ $resource->type_label ?? optional($resource->category)->name ?? 'Resource' }}
    </span>

    <div class="mres-card-icon">
        <i class="{{ $resource->main_icon ?: 'bi bi-file-earmark-text' }}"></i>
    </div>
</div>



                        <div class="mres-card-body">
                            <h3 class="mres-card-title">
                                {{ $resource->title }}
                            </h3>

                            @if($resource->short_description)
                                <p class="mres-card-text">
                                    {{ $resource->short_description }}
                                </p>
                            @endif

                            <div class="mres-card-meta">
                                @if($resource->read_time)
                                    <span>
                                        <i class="bi bi-clock"></i>
                                        {{ $resource->read_time }}
                                    </span>
                                @endif

                                @if($resource->industry_or_meta)
                                    <span>
                                        <i class="bi bi-diagram-3"></i>
                                        {{ $resource->industry_or_meta }}
                                    </span>
                                @elseif($resource->category)
                                    <span>
                                        <i class="{{ $resource->category->icon ?: 'bi bi-folder' }}"></i>
                                        {{ $resource->category->name }}
                                    </span>
                                @endif
                            </div>

                            @if(count($resource->tags_array))
                                <div class="mres-card-tags">
                                    @foreach($resource->tags_array as $tag)
                                        <span>{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <a href="{{ $resource->button_link }}"
                               class="mres-card-link"
                               @if($resource->file_url) target="_blank" @endif>
                                {{ $resource->button_text ?? ($resource->file_url ? 'Download File' : 'Read article') }}
                                <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>

                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center bg-white rounded-4 shadow-sm p-5">
                        <div class="mb-3" style="font-size:42px;color:#94a3b8;">
                            <i class="bi bi-search"></i>
                        </div>

                        <h3 class="h5 fw-semibold mb-2">
                            No resources found
                        </h3>

                        <p class="text-secondary mb-3">
                            Try another search keyword or clear filters.
                        </p>

                        <a href="{{ route('resources') }}" class="btn btn-gradient rounded-pill px-4">
                            View All Resources
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($resources->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $resources->links() }}
            </div>
        @endif

    </div>
</section>


<!-- ============= Help Strip / CTA ============= -->
  <section class="mres-help">
    <div class="container">
      <div class="mres-help-card rounded-4 shadow-lg border">
        <div class="row align-items-center g-3 g-lg-4">
          <div class="col-lg-8">
            <div class="d-flex align-items-center gap-2 mb-1">
              <span class="badge rounded-pill text-dark mres-help-badge">
                <i class="bi bi-lightbulb me-1"></i> Need guidance?
              </span>
            </div>
            <h2 class="h4 mb-2">Not sure which spec fits your line?</h2>
            <p class="mb-0 text-secondary">
              Share your forming, sealing and product details — we’ll suggest foils, lacquers and structures that fit
              your QA expectations.
            </p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <div class="d-flex justify-content-lg-end justify-content-start gap-2">
              <a href="index.html#rfq" class="btn btn-gradient rounded-pill">
                Request a spec consult
              </a>
              <a href="index.html#contact" class="btn btn-outline-dark rounded-pill">
                Contact team
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .mres-card-media {
    position: relative;
    overflow: hidden;
}

.mres-card-media.has-image {
    background: #0f172a;
}

.mres-card-img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .45s ease;
}

.mres-card:hover .mres-card-img {
    transform: scale(1.06);
}

.mres-card-img-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg, rgba(2,6,23,.10), rgba(2,6,23,.62)),
        radial-gradient(500px 240px at 0% 0%, rgba(4,148,230,.20), transparent 65%);
    pointer-events: none;
}

.mres-card-type,
.mres-card-icon {
    z-index: 2;
}
</style>

@endsection