@extends('layouts.admin')

@section('page-title', 'Show Resource Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resource-categories.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Resource Category Details</h2>
        <p class="admin-page-subtitle">
            Full details for this resource category
        </p>
    </div>

    <div class="show-actions">
        @can('resource_category_edit')
            <a href="{{ route('admin.resource-categories.edit', $resourceCategory->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan

        @can('resource_category_delete')
            <form action="{{ route('admin.resource-categories.destroy', $resourceCategory->id) }}"
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
                <div class="profile-avatar-lg" style="background:#0494E6;">
                    <i class="{{ $resourceCategory->icon ?: 'fas fa-tag' }}"></i>
                </div>

                <p class="profile-title">{{ $resourceCategory->name }}</p>
                <p class="profile-subtitle">{{ $resourceCategory->slug }}</p>

                @if($resourceCategory->status)
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

                <p class="detail-section-title">Category Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $resourceCategory->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $resourceCategory->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value code-pill">{{ $resourceCategory->slug }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">{{ $resourceCategory->icon ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $resourceCategory->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Resources</span>
                    <span class="detail-value">{{ $resourceCategory->resources->count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection