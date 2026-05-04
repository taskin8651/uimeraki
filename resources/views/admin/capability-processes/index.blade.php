@extends('layouts.admin')

@section('page-title', 'Capability Process Steps')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Capability Process Steps</h2>
        <p class="admin-page-subtitle">
            Manage workflow steps shown on capability page
        </p>
    </div>

    @can('capability_process_create')
        <a href="{{ route('admin.capability-processes.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Process Step
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
        <p class="stat-label">Total Steps</p>
        <p class="stat-value">{{ $processes->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $processes->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $processes->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $processes->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Process Steps</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Sort order controls frontend sequence
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CapabilityProcess">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Process Step</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($processes as $process)
                    <tr data-entry-id="{{ $process->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $process->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    <i class="{{ $process->icon ?: 'fas fa-project-diagram' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $process->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($process->description, 90) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="id-text">{{ $process->sort_order }}</span>
                        </td>

                        <td>
                            @if($process->status)
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
                                @can('capability_process_show')
                                    <a href="{{ route('admin.capability-processes.show', $process->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('capability_process_edit')
                                    <a href="{{ route('admin.capability-processes.edit', $process->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('capability_process_delete')
                                    <form action="{{ route('admin.capability-processes.destroy', $process->id) }}"
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
    initAdminDataTable('.datatable-CapabilityProcess', {
        canDelete: @can('capability_process_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search process steps...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ process steps'
    });
});
</script>
@endsection