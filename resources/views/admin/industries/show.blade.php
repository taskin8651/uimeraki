@extends('layouts.admin')

@section('page-title', 'Show Industry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.industries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Industry Details</h2>

        <p class="admin-page-subtitle">
            Full details for this industry card
        </p>
    </div>

    <div class="show-actions">
        @can('industry_edit')
            <a href="{{ route('admin.industries.edit', $industry->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan

        @can('industry_delete')
            <form action="{{ route('admin.industries.destroy', $industry->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                    <img src="{{ $industry->image_url }}" alt="{{ $industry->title }}" style="width:100%;height:100%;object-fit:cover;">
                </div>

                <p class="profile-title">{{ $industry->title }}</p>
                <p class="profile-subtitle">{{ $industry->badge_text ?? 'Industry' }}</p>

                @if($industry->status)
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
                @can('industry_edit')
                    <a href="{{ route('admin.industries.edit', $industry->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Industry
                    </a>
                @endcan

                <a href="{{ route('admin.industries.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Industries
                </a>

                @can('industry_create')
                    <a href="{{ route('admin.industries.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Industry
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Industry Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $industry->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $industry->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value code-pill">{{ $industry->slug }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{!! nl2br(e($industry->description ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badge</span>
                    <span class="detail-value">
                        @if($industry->badge_icon)
                            <i class="{{ $industry->badge_icon }}"></i>
                        @endif
                        {{ $industry->badge_text ?? '—' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Tags</span>

                    <div class="tag-wrap">
                        @forelse($industry->tags_array as $tag)
                            <span class="role-tag">{{ $tag }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $industry->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($industry->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($industry->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection