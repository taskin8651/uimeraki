@extends('layouts.admin')

@section('page-title', 'Quality Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Quality Page</h2>
        <p class="admin-page-subtitle">
            Manage quality page hero, metrics, QA snapshot heading, pillar heading and process heading
        </p>
    </div>

    @can('quality_page_edit')
        <a href="{{ route('admin.quality-pages.edit', $qualityPage->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Quality Page
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
        <p class="stat-label">KPI 1</p>
        <p class="stat-value">{{ $qualityPage->hero_kpi_1_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">KPI 2</p>
        <p class="stat-value">{{ $qualityPage->hero_kpi_2_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">KPI 3</p>
        <p class="stat-value">{{ $qualityPage->hero_kpi_3_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Status</p>
        <p class="stat-value">{{ $qualityPage->status ? 'Active' : 'Inactive' }}</p>
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background:#0494E6;">
                    <i class="fas fa-award"></i>
                </div>

                <p class="profile-title">{{ $qualityPage->hero_eyebrow ?? 'Quality Page' }}</p>
                <p class="profile-subtitle">
                    {{ $qualityPage->hero_title }} {{ $qualityPage->hero_highlight }}
                </p>

                @if($qualityPage->status)
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
                @can('quality_page_edit')
                    <a href="{{ route('admin.quality-pages.edit', $qualityPage->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Page
                    </a>
                @endcan

                @can('quality_snapshot_access')
                    <a href="{{ route('admin.quality-snapshots.index') }}" class="quick-link">
                        <i class="fas fa-th-large"></i>
                        QA Snapshots
                    </a>
                @endcan

                @can('quality_pillar_access')
                    <a href="{{ route('admin.quality-pillars.index') }}" class="quick-link">
                        <i class="fas fa-shield-alt"></i>
                        Quality Pillars
                    </a>
                @endcan

                @can('quality_process_access')
                    <a href="{{ route('admin.quality-processes.index') }}" class="quick-link">
                        <i class="fas fa-project-diagram"></i>
                        QA Process
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
                    <span class="detail-value">{{ $qualityPage->hero_eyebrow ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $qualityPage->hero_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Highlight</span>
                    <span class="detail-value">{{ $qualityPage->hero_highlight ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $qualityPage->hero_description ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Chips</span>
                    <div class="tag-wrap">
                        @forelse($qualityPage->hero_chips_array as $chip)
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
                    <i class="fas fa-chart-line"></i>
                </div>
                <p class="detail-section-title">Hero Metrics</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">KPI 1</span>
                    <span class="detail-value">{{ $qualityPage->hero_kpi_1_value }} - {{ $qualityPage->hero_kpi_1_label }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">KPI 2</span>
                    <span class="detail-value">{{ $qualityPage->hero_kpi_2_value }} - {{ $qualityPage->hero_kpi_2_label }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">KPI 3</span>
                    <span class="detail-value">{{ $qualityPage->hero_kpi_3_value }} - {{ $qualityPage->hero_kpi_3_label }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <p class="detail-section-title">Sections</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Snapshot</span>
                    <span class="detail-value">{{ $qualityPage->snapshot_label }} / {{ $qualityPage->snapshot_badge }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Pillars</span>
                    <span class="detail-value">{{ $qualityPage->pillar_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Process</span>
                    <span class="detail-value">{{ $qualityPage->process_title ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection