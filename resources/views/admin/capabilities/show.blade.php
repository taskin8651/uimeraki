@extends('layouts.admin')

@section('page-title', 'Show Capability')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capabilities.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Capability Details</h2>

        <p class="admin-page-subtitle">
            Full details for this capability card
        </p>
    </div>

    <div class="show-actions">
        @can('capability_edit')
            <a href="{{ route('admin.capabilities.edit', $capability->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan

        @can('capability_delete')
            <form action="{{ route('admin.capabilities.destroy', $capability->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                <div style="width:100%;height:220px;border-radius:20px;overflow:hidden;background:#F8FAFC;border:1px solid #E2E8F0;margin-bottom:16px;">
                    <img src="{{ $capability->image_url }}" alt="{{ $capability->title }}" style="width:100%;height:100%;object-fit:cover;">
                </div>

                <p class="profile-title">{{ $capability->title }}</p>
                <p class="profile-subtitle">{{ $capability->badge_text ?? 'Capability' }}</p>

                @if($capability->status)
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
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Capability Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $capability->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $capability->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{!! nl2br(e($capability->description ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badge</span>
                    <span class="detail-value">
                        @if($capability->badge_icon)
                            <i class="{{ $capability->badge_icon }}"></i>
                        @endif
                        {{ $capability->badge_text ?? '—' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Tags</span>
                    <div class="tag-wrap">
                        @forelse($capability->tags_array as $tag)
                            <span class="role-tag">{{ $tag }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $capability->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($capability->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection