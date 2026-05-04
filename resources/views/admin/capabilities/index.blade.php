@extends('layouts.admin')

@section('page-title', 'Capabilities')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Capabilities</h2>
        <p class="admin-page-subtitle">
            Manage capability cards shown on frontend capabilities page
        </p>
    </div>

    @can('capability_create')
        <a href="{{ route('admin.capabilities.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Capability
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
        <p class="stat-label">Total</p>
        <p class="stat-value">{{ $capabilities->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $capabilities->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $capabilities->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $capabilities->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Capabilities</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Sort order controls frontend sequence
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Capability">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Capability</th>
                    <th>Badge</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($capabilities as $capability)
                    <tr data-entry-id="{{ $capability->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $capability->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div style="width:46px;height:46px;border-radius:14px;overflow:hidden;background:#F8FAFC;border:1px solid #E2E8F0;flex-shrink:0;">
                                    <img src="{{ $capability->image_url }}" alt="{{ $capability->title }}" style="width:100%;height:100%;object-fit:cover;">
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $capability->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($capability->description, 80) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($capability->badge_text)
                                <span class="role-tag">
                                    @if($capability->badge_icon)
                                        <i class="{{ $capability->badge_icon }}"></i>
                                    @endif
                                    {{ $capability->badge_text }}
                                </span>
                            @else
                                <span style="font-size:12px;color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $capability->sort_order }}</span>
                        </td>

                        <td>
                            @if($capability->status)
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
                                @can('capability_show')
                                    <a href="{{ route('admin.capabilities.show', $capability->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('capability_edit')
                                    <a href="{{ route('admin.capabilities.edit', $capability->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('capability_delete')
                                    <form action="{{ route('admin.capabilities.destroy', $capability->id) }}"
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
    initAdminDataTable('.datatable-Capability', {
        canDelete: @can('capability_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search capabilities...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ capabilities'
    });
});
</script>
@endsection