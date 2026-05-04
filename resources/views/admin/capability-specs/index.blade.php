@extends('layouts.admin')

@section('page-title', 'Capability Specifications')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Capability Specifications</h2>
        <p class="admin-page-subtitle">
            Manage technical specification rows shown in capability table
        </p>
    </div>

    @can('capability_spec_create')
        <a href="{{ route('admin.capability-specs.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Specification
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
        <p class="stat-label">Total Specs</p>
        <p class="stat-value">{{ $specs->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $specs->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $specs->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $specs->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Specifications</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Sort order controls frontend sequence
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CapabilitySpec">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Process</th>
                    <th>Range / Detail</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($specs as $spec)
                    <tr data-entry-id="{{ $spec->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $spec->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    <i class="{{ $spec->icon ?: 'fas fa-table' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $spec->process }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($spec->notes, 80) }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ \Illuminate\Support\Str::limit($spec->range_detail, 80) ?: '—' }}
                        </td>

                        <td>
                            <span class="id-text">{{ $spec->sort_order }}</span>
                        </td>

                        <td>
                            @if($spec->status)
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
                                @can('capability_spec_show')
                                    <a href="{{ route('admin.capability-specs.show', $spec->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('capability_spec_edit')
                                    <a href="{{ route('admin.capability-specs.edit', $spec->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('capability_spec_delete')
                                    <form action="{{ route('admin.capability-specs.destroy', $spec->id) }}"
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
    initAdminDataTable('.datatable-CapabilitySpec', {
        canDelete: @can('capability_spec_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search specifications...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ specifications'
    });
});
</script>
@endsection