@extends('layouts.admin')

@section('page-title', 'Show Product Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.product-categories.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Product Category Details</h2>

        <p class="admin-page-subtitle">
            Full details for this product category
        </p>
    </div>

    <div class="show-actions">
        @can('product_category_edit')
            <a href="{{ route('admin.product-categories.edit', $productCategory->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Category
            </a>
        @endcan

        @can('product_category_delete')
            <form action="{{ route('admin.product-categories.destroy', $productCategory->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

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
                    <i class="{{ $productCategory->icon ?: 'fas fa-layer-group' }}"></i>
                </div>

                <p class="profile-title">{{ $productCategory->name }}</p>
                <p class="profile-subtitle">{{ $productCategory->slug }}</p>

                @if($productCategory->status)
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

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Category ID</p>
                        <p class="stat-mini-value">#{{ $productCategory->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $productCategory->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($productCategory->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('product_category_edit')
                    <a href="{{ route('admin.product-categories.edit', $productCategory->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Category
                    </a>
                @endcan

                <a href="{{ route('admin.product-categories.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Categories
                </a>

                @can('product_category_create')
                    <a href="{{ route('admin.product-categories.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Category
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

                <p class="detail-section-title">Category Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $productCategory->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $productCategory->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $productCategory->slug }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        @if($productCategory->icon)
                            <i class="{{ $productCategory->icon }}"></i>
                            {{ $productCategory->icon }}
                        @else
                            —
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $productCategory->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value">
                        @if($productCategory->status)
                            <span class="status-pill success">Active</span>
                        @else
                            <span class="status-pill warning">Inactive</span>
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($productCategory->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($productCategory->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection