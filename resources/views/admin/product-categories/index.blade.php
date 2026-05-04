@extends('layouts.admin')

@section('page-title', 'Product Categories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Product Categories</h2>
        <p class="admin-page-subtitle">
            Manage all product categories used on the frontend products page
        </p>
    </div>

    @can('product_category_create')
        <a href="{{ route('admin.product-categories.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Product Category
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Categories</p>
        <p class="stat-value">{{ $categories->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $categories->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $categories->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $categories->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

@if(session('success'))
    <div class="alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Product Categories</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Categories control product sections
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ProductCategory">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Icon</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $category->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    <i class="{{ $category->icon ?: 'fas fa-layer-group' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $category->name }}</p>
                                    <p class="table-sub-text">Product Category</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $category->slug }}
                        </td>

                        <td>
                            @if($category->icon)
                                <span class="role-tag">
                                    <i class="{{ $category->icon }}"></i>
                                    {{ $category->icon }}
                                </span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $category->sort_order }}</span>
                        </td>

                        <td>
                            @if($category->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('product_category_show')
                                    <a href="{{ route('admin.product-categories.show', $category->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('product_category_edit')
                                    <a href="{{ route('admin.product-categories.edit', $category->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('product_category_delete')
                                    <form action="{{ route('admin.product-categories.destroy', $category->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-ProductCategory', {
        canDelete: @can('product_category_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search categories...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ categories'
    });
});
</script>
@endsection