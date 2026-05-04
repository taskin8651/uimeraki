@extends('layouts.admin')

@section('page-title', 'Industry Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Industry Page</h2>
        <p class="admin-page-subtitle">
            Manage industries page hero and section content
        </p>
    </div>

    @can('industry_page_edit')
        <a href="{{ route('admin.industry-pages.edit', $industryPage->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Industry Page
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
        <p class="stat-label">Hero</p>
        <p class="stat-value">{{ $industryPage->hero_eyebrow ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Section</p>
        <p class="stat-value">{{ $industryPage->section_eyebrow ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Chips</p>
        <p class="stat-value">{{ count($industryPage->hero_chips_array) }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Status</p>
        <p class="stat-value">{{ $industryPage->status ? 'Active' : 'Inactive' }}</p>
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div style="width:100%;height:230px;border-radius:20px;overflow:hidden;background:#F8FAFC;border:1px solid #E2E8F0;margin-bottom:16px;">
                    <img src="{{ $industryPage->hero_image_url }}" alt="Industry Hero" style="width:100%;height:100%;object-fit:cover;">
                </div>

                <p class="profile-title">{{ $industryPage->hero_eyebrow ?? 'Industries' }}</p>
                <p class="profile-subtitle">
                    {{ $industryPage->hero_title }} {{ $industryPage->hero_highlight }}
                </p>

                @if($industryPage->status)
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
                @can('industry_page_edit')
                    <a href="{{ route('admin.industry-pages.edit', $industryPage->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Page
                    </a>
                @endcan

                @can('industry_access')
                    <a href="{{ route('admin.industries.index') }}" class="quick-link">
                        <i class="fas fa-industry"></i>
                        Manage Industries
                    </a>
                @endcan

                @can('industry_create')
                    <a href="{{ route('admin.industries.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add Industry
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <p class="detail-section-title">Hero Section</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Eyebrow</span>
                    <span class="detail-value">{{ $industryPage->hero_eyebrow ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $industryPage->hero_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Highlight</span>
                    <span class="detail-value">{{ $industryPage->hero_highlight ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $industryPage->hero_description ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Chips</span>
                    <div class="tag-wrap">
                        @forelse($industryPage->hero_chips_array as $chip)
                            <span class="role-tag">{{ $chip }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <p class="detail-section-title">Industries Section</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Eyebrow</span>
                    <span class="detail-value">{{ $industryPage->section_eyebrow ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $industryPage->section_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $industryPage->section_description ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection