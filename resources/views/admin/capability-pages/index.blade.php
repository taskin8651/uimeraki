@extends('layouts.admin')

@section('page-title', 'Capability Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Capability Page</h2>
        <p class="admin-page-subtitle">
            Manage hero, specs intro, process intro and CTA content
        </p>
    </div>

    @can('capability_page_edit')
        <a href="{{ route('admin.capability-pages.edit', $capabilityPage->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Capability Page
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
        <p class="stat-value">{{ $capabilityPage->hero_kpi_1_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">KPI 2</p>
        <p class="stat-value">{{ $capabilityPage->hero_kpi_2_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">KPI 3</p>
        <p class="stat-value">{{ $capabilityPage->hero_kpi_3_value ?? '-' }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Status</p>
        <p class="stat-value">{{ $capabilityPage->status ? 'Active' : 'Inactive' }}</p>
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div style="width:100%;height:230px;border-radius:20px;overflow:hidden;background:#F8FAFC;border:1px solid #E2E8F0;margin-bottom:16px;">
                    <img src="{{ $capabilityPage->hero_image_url }}" alt="Capability Hero" style="width:100%;height:100%;object-fit:cover;">
                </div>

                <p class="profile-title">{{ $capabilityPage->hero_eyebrow ?? 'Capabilities' }}</p>
                <p class="profile-subtitle">
                    {{ $capabilityPage->hero_title }} {{ $capabilityPage->hero_highlight }}
                </p>

                @if($capabilityPage->status)
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
                @can('capability_page_edit')
                    <a href="{{ route('admin.capability-pages.edit', $capabilityPage->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Page
                    </a>
                @endcan

                @can('capability_access')
                    <a href="{{ route('admin.capabilities.index') }}" class="quick-link">
                        <i class="fas fa-cogs"></i>
                        Manage Capabilities
                    </a>
                @endcan

                @can('capability_spec_access')
                    <a href="{{ route('admin.capability-specs.index') }}" class="quick-link">
                        <i class="fas fa-table"></i>
                        Manage Specs
                    </a>
                @endcan

                @can('capability_process_access')
                    <a href="{{ route('admin.capability-processes.index') }}" class="quick-link">
                        <i class="fas fa-project-diagram"></i>
                        Manage Process
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
                    <span class="detail-value">{{ $capabilityPage->hero_eyebrow ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $capabilityPage->hero_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Highlight</span>
                    <span class="detail-value">{{ $capabilityPage->hero_highlight ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $capabilityPage->hero_description ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Chips</span>
                    <div class="tag-wrap">
                        @forelse($capabilityPage->hero_chips_array as $chip)
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
                    <i class="fas fa-bullhorn"></i>
                </div>
                <p class="detail-section-title">CTA Section</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">CTA Title</span>
                    <span class="detail-value">{{ $capabilityPage->cta_title ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">CTA Button</span>
                    <span class="detail-value">{{ $capabilityPage->cta_button_text ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Visual Label</span>
                    <span class="detail-value">{{ $capabilityPage->hero_visual_label ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection