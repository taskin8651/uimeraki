@extends('layouts.admin')

@section('page-title', 'Resources')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Resources</h2>
        <p class="admin-page-subtitle">
            Manage guides, technical notes, case studies, FAQs and downloadable files
        </p>
    </div>

    @can('resource_create')
        <a href="{{ route('admin.resources.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Resource
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
        <p class="stat-label">Total Resources</p>
        <p class="stat-value">{{ $resources->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $resources->where('is_featured', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $resources->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Downloads</p>
        <p class="stat-value">{{ $resources->filter(fn($item) => $item->file_url)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Resources</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Resource">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Resource</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($resources as $resource)
                    <tr data-entry-id="{{ $resource->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $resource->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    <i class="{{ $resource->main_icon ?: 'fas fa-newspaper' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $resource->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($resource->short_description, 80) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($resource->category)
                                <span class="role-tag">{{ $resource->category->name }}</span>
                            @else
                                <span style="font-size:12px;color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $resource->type_label ?? 'Resource' }}
                            </span>
                        </td>

                        <td>
                            @if($resource->is_featured)
                                <span class="status-pill success">
                                    <i class="fas fa-star"></i>
                                    Featured
                                </span>
                            @else
                                <span style="font-size:12px;color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($resource->status)
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
                                @can('resource_show')
                                    <a href="{{ route('admin.resources.show', $resource->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('resource_edit')
                                    <a href="{{ route('admin.resources.edit', $resource->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('resource_delete')
                                    <form action="{{ route('admin.resources.destroy', $resource->id) }}"
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
    initAdminDataTable('.datatable-Resource', {
        canDelete: @can('resource_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search resources...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ resources'
    });
});
</script>
@endsection