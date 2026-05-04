@extends('layouts.admin')

@section('page-title', 'Show About Timeline')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-timelines.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Timeline Details</h2>

        <p class="admin-page-subtitle">
            Full details for this journey timeline item
        </p>
    </div>

    <div class="show-actions">
        @can('about_timeline_edit')
            <a href="{{ route('admin.about-timelines.edit', $aboutTimeline->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan

        @can('about_timeline_delete')
            <form action="{{ route('admin.about-timelines.destroy', $aboutTimeline->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
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
                    <i class="fas fa-stream"></i>
                </div>

                <p class="profile-title">{{ $aboutTimeline->title }}</p>
                <p class="profile-subtitle">Timeline Item</p>

                @if($aboutTimeline->status)
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

                <p class="detail-section-title">Timeline Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $aboutTimeline->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $aboutTimeline->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{!! nl2br(e($aboutTimeline->description ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $aboutTimeline->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    @if($aboutTimeline->status)
                        <span class="status-pill success">Active</span>
                    @else
                        <span class="status-pill warning">Inactive</span>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($aboutTimeline->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($aboutTimeline->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection