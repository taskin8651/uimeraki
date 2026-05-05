@extends('layouts.admin')

@section('page-title', 'Show Resource Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resource-pages.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Resource Page Details</h2>
        <p class="admin-page-subtitle">
            Full details for resources page settings
        </p>
    </div>

    @can('resource_page_edit')
        <a href="{{ route('admin.resource-pages.edit', $resourcePage->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Resource Page
        </a>
    @endcan
</div>

<div class="detail-card">
    <div class="detail-section-head">
        <div class="detail-section-icon">
            <i class="fas fa-book-open"></i>
        </div>

        <p class="detail-section-title">Resource Page Information</p>
    </div>

    <div class="detail-section-body">
        <div class="detail-row">
            <span class="detail-label">ID</span>
            <span class="detail-value code-pill">#{{ $resourcePage->id }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Hero Eyebrow</span>
            <span class="detail-value">{{ $resourcePage->hero_eyebrow ?? '—' }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Hero Title</span>
            <span class="detail-value">{{ $resourcePage->hero_title ?? '—' }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Hero Description</span>
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

        <div class="detail-row">
            <span class="detail-label">Featured Resource</span>
            <span class="detail-value">{{ optional($resourcePage->featuredResource)->title ?? 'Auto selected' }}</span>
        </div>
    </div>
</div>

@endsection