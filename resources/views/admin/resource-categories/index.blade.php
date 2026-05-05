@extends('layouts.admin')

@section('page-title', 'Resource Categories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Resource Categories</h2>
        <p class="admin-page-subtitle">
            Manage resource filters like Guides, Technical Notes, Case Studies and FAQs
        </p>
    </div>

    @can('resource_category_create')
        <a href="{{ route('admin.resource-categories.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Category
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
        <p class="stat-label">Resources</p>
        <p class="stat-value">{{ $categories->sum('resources_count') }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Resource Categories</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ResourceCategory">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Resources</th>
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
                                    <i class="{{ $category->icon ?: 'fas fa-tag' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $category->name }}</p>
                                    <p class="table-sub-text">Resource Category</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="code-pill">{{ $category->slug }}</span>
                        </td>

                        <td>
                            <span class="role-tag">{{ $category->resources_count }} resources</span>
                        </td>

                        <td>
                            <span class="id-text">{{ $category->sort_order }}</span>
                        </td>

                        <td>
                            @if($category->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px;color:#166534;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px;color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('resource_category_show')
                                    <a href="{{ route('admin.resource-categories.show', $category->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('resource_category_edit')
                                    <a href="{{ route('admin.resource-categories.edit', $category->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('resource_category_delete')
                                    <form action="{{ route('admin.resource-categories.destroy', $category->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @csrf
                                        @method('DELETE')

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
    initAdminDataTable('.datatable-ResourceCategory', {
        canDelete: @can('resource_category_delete') true @else false @endcan,
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