@extends('layouts.admin')

@section('page-title', 'Show Quality Process Step')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-processes.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Quality Process Step Details</h2>
        <p class="admin-page-subtitle">Full details for this QA process step</p>
    </div>

    <div class="show-actions">
        @can('quality_process_edit')
            <a href="{{ route('admin.quality-processes.edit', $qualityProcess->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i> Edit
            </a>
        @endcan

        @can('quality_process_delete')
            <form action="{{ route('admin.quality-processes.destroy', $qualityProcess->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                    <i class="{{ $qualityProcess->icon ?: 'fas fa-project-diagram' }}"></i>
                </div>

                <p class="profile-title">{{ $qualityProcess->title }}</p>
                <p class="profile-subtitle">Quality Process Step</p>

                @if($qualityProcess->status)
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
                <p class="detail-section-title">Process Step Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $qualityProcess->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">{{ $qualityProcess->icon ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $qualityProcess->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{!! nl2br(e($qualityProcess->description ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Points</span>
                    <div class="tag-wrap">
                        @forelse($qualityProcess->points_array as $point)
                            <span class="role-tag">{{ $point }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $qualityProcess->sort_order }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection