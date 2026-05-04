@extends('layouts.admin')

@section('page-title', 'Products')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Products</h2>
        <p class="admin-page-subtitle">
            Manage product details, specifications, images and frontend visibility
        </p>
    </div>

    @can('product_create')
        <a href="{{ route('admin.products.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Product
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Products</p>
        <p class="stat-value">{{ $products->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $products->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $products->where('is_featured', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $products->where('created_at', '>=', now()->startOfDay())->count() }}</p>
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
        <p class="page-card-title">All Products</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Product data appears on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Product">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr data-entry-id="{{ $product->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $product->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div style="width:46px;height:46px;border-radius:14px;overflow:hidden;border:1px solid #E2E8F0;background:#F8FAFC;flex:0 0 auto;">
                                    <img src="{{ $product->main_image_url }}"
                                         alt="{{ $product->name }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $product->name }}</p>
                                    <p class="table-sub-text">{{ $product->slug }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($product->category)
                                <span class="role-tag">{{ $product->category->name }}</span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($product->is_featured)
                                <span class="status-pill success">
                                    <i class="fas fa-star"></i>
                                    Featured
                                </span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">No</span>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $product->sort_order }}</span>
                        </td>

                        <td>
                            @if($product->status)
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
                                @can('product_show')
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('product_edit')
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('product_delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
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
    initAdminDataTable('.datatable-Product', {
        canDelete: @can('product_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search products...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ products'
    });
});
</script>
@endsection