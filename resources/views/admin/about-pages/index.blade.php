@extends('layouts.admin')

@section('page-title', 'About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Page</h2>
        <p class="admin-page-subtitle">
            Manage about page hero, mission, vision, why section and CTA content
        </p>
    </div>

    @can('about_page_edit')
        <a href="{{ route('admin.about-pages.edit', $aboutPage->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit About Page
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
        <p class="stat-label">Hero Stat 1</p>
        <p class="stat-value">{{ $aboutPage->hero_stat_1_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Hero Stat 2</p>
        <p class="stat-value">{{ $aboutPage->hero_stat_2_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Hero Stat 3</p>
        <p class="stat-value">{{ $aboutPage->hero_stat_3_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Status</p>
        <p class="stat-value">{{ $aboutPage->status ? 'Active' : 'Inactive' }}</p>
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div style="width:100%;height:230px;border-radius:20px;overflow:hidden;background:#F8FAFC;border:1px solid #E2E8F0;margin-bottom:16px;">
                    <img src="{{ $aboutPage->hero_image_url }}" alt="About Hero" style="width:100%;height:100%;object-fit:cover;">
                </div>

                <p class="profile-title">{{ $aboutPage->hero_eyebrow ?? 'About Page' }}</p>
                <p class="profile-subtitle">{{ $aboutPage->hero_title }} {{ $aboutPage->hero_highlight }}</p>

                @if($aboutPage->status)
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
                @can('about_page_edit')
                    <a href="{{ route('admin.about-pages.edit', $aboutPage->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit About Page
                    </a>
                @endcan

                @can('about_timeline_access')
                    <a href="{{ route('admin.about-timelines.index') }}" class="quick-link">
                        <i class="fas fa-stream"></i>
                        Manage Timeline
                    </a>
                @endcan

                @can('about_feature_access')
                    <a href="{{ route('admin.about-features.index') }}" class="quick-link">
                        <i class="fas fa-star"></i>
                        Manage Features
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
                    <span class="detail-value">{{ $aboutPage->hero_eyebrow ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $aboutPage->hero_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Highlight</span>
                    <span class="detail-value">{{ $aboutPage->hero_highlight ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $aboutPage->hero_description ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Chips</span>
                    <div class="tag-wrap">
                        @forelse($aboutPage->hero_chips_array as $chip)
                            <span class="role-tag">{{ $chip }}</span>
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
                    <i class="fas fa-bullseye"></i>
                </div>

                <p class="detail-section-title">Mission & Vision</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Mission</span>
                    <span class="detail-value">{{ $aboutPage->mission_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Vision</span>
                    <span class="detail-value">{{ $aboutPage->vision_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">CTA</span>
                    <span class="detail-value">{{ $aboutPage->cta_title ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection