@extends('layouts.admin')

@section('page-title', 'Resource Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Resource Page</h2>
        <p class="admin-page-subtitle">
            Manage resources page hero, search text, quick tags, meta stats and featured resource
        </p>
    </div>

    @can('resource_page_edit')
        <a href="{{ route('admin.resource-pages.edit', $resourcePage->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Resource Page
        </a>
    @endcan
</div>

@if(session('success'))
    <div class="alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">{{ $resourcePage->meta_1_label ?? 'Meta 1' }}</p>
        <p class="stat-value">{{ $resourcePage->meta_1_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">{{ $resourcePage->meta_2_label ?? 'Meta 2' }}</p>
        <p class="stat-value">{{ $resourcePage->meta_2_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">{{ $resourcePage->meta_3_label ?? 'Meta 3' }}</p>
        <p class="stat-value">{{ $resourcePage->meta_3_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Status</p>
        <p class="stat-value">{{ $resourcePage->status ? 'Active' : 'Inactive' }}</p>
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background:#0494E6;">
                    <i class="fas fa-book-open"></i>
                </div>

                <p class="profile-title">{{ $resourcePage->hero_eyebrow ?? 'Resource Page' }}</p>
                <p class="profile-subtitle">
                    {{ \Illuminate\Support\Str::limit($resourcePage->hero_title, 90) }}
                </p>

                @if($resourcePage->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('resource_page_edit')
                    <a href="{{ route('admin.resource-pages.edit', $resourcePage->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Page
                    </a>
                @endcan

                @can('resource_category_access')
                    <a href="{{ route('admin.resource-categories.index') }}" class="quick-link">
                        <i class="fas fa-tags"></i>
                        Resource Categories
                    </a>
                @endcan

                @can('resource_access')
                    <a href="{{ route('admin.resources.index') }}" class="quick-link">
                        <i class="fas fa-newspaper"></i>
                        Resources
                    </a>
                @endcan

                @can('resource_create')
                    <a href="{{ route('admin.resources.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add Resource
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-home"></i>
                </div>
                <p class="detail-section-title">Hero Section</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Eyebrow</span>
                    <span class="detail-value">{{ $resourcePage->hero_eyebrow ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $resourcePage->hero_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $resourcePage->hero_description ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Search Placeholder</span>
                    <span class="detail-value">{{ $resourcePage->search_placeholder ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Quick Tags</span>
                    <div class="tag-wrap">
                        @forelse($resourcePage->quick_tags_array as $tag)
                            <span class="role-tag">{{ $tag }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <p class="detail-section-title">Meta Stats</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Meta 1</span>
                    <span class="detail-value">{{ $resourcePage->meta_1_value }} - {{ $resourcePage->meta_1_label }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Meta 2</span>
                    <span class="detail-value">{{ $resourcePage->meta_2_value }} - {{ $resourcePage->meta_2_label }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Meta 3</span>
                    <span class="detail-value">{{ $resourcePage->meta_3_value }} - {{ $resourcePage->meta_3_label }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-star"></i>
                </div>
                <p class="detail-section-title">Featured Resource</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Featured Label</span>
                    <span class="detail-value">{{ $resourcePage->featured_label ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Selected Resource</span>
                    <span class="detail-value">
                        {{ optional($resourcePage->featuredResource)->title ?? 'Auto from featured resource' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection