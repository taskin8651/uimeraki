@extends('layouts.admin')

@section('page-title', 'Show Quality Pillar')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-pillars.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Quality Pillar Details</h2>
        <p class="admin-page-subtitle">Full details for this quality pillar</p>
    </div>

    <div class="show-actions">
        @can('quality_pillar_edit')
            <a href="{{ route('admin.quality-pillars.edit', $qualityPillar->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i> Edit
            </a>
        @endcan

        @can('quality_pillar_delete')
            <form action="{{ route('admin.quality-pillars.destroy', $qualityPillar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background:#0494E6;">
                    <i class="{{ $qualityPillar->icon ?: 'fas fa-shield-alt' }}"></i>
                </div>

                <p class="profile-title">{{ $qualityPillar->title }}</p>
                <p class="profile-subtitle">Quality Pillar</p>

                @if($qualityPillar->status)
                    <span class="status-pill success"><i class="fas fa-check-circle"></i> Active</span>
                @else
                    <span class="status-pill warning"><i class="fas fa-clock"></i> Inactive</span>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <p class="detail-section-title">Pillar Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $qualityPillar->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">{{ $qualityPillar->icon ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $qualityPillar->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{!! nl2br(e($qualityPillar->description ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Points</span>
                    <div class="tag-wrap">
                        @forelse($qualityPillar->points_array as $point)
                            <span class="role-tag">{{ $point }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $qualityPillar->sort_order }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection