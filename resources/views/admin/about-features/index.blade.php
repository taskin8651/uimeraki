@extends('layouts.admin')

@section('page-title', 'About Features')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Features</h2>
        <p class="admin-page-subtitle">
            Manage Why Meraki feature cards
        </p>
    </div>

    @can('about_feature_create')
        <a href="{{ route('admin.about-features.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Feature
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
        <p class="stat-label">Total Features</p>
        <p class="stat-value">{{ $features->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $features->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $features->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $features->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Features</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            These cards appear in Why Meraki section
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutFeature">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Feature</th>
                    <th>Icon</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($features as $feature)
                    <tr data-entry-id="{{ $feature->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $feature->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    <i class="{{ $feature->icon ?: 'fas fa-star' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $feature->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($feature->description, 80) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($feature->icon)
                                <span class="role-tag">
                                    <i class="{{ $feature->icon }}"></i>
                                    {{ $feature->icon }}
                                </span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $feature->sort_order }}</span>
                        </td>

                        <td>
                            @if($feature->status)
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
                                @can('about_feature_show')
                                    <a href="{{ route('admin.about-features.show', $feature->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('about_feature_edit')
                                    <a href="{{ route('admin.about-features.edit', $feature->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('about_feature_delete')
                                    <form action="{{ route('admin.about-features.destroy', $feature->id) }}"
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
    initAdminDataTable('.datatable-AboutFeature', {
        canDelete: @can('about_feature_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search features...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ features'
    });
});
</script>
@endsection