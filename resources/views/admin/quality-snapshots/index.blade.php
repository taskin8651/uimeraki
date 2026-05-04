@extends('layouts.admin')

@section('page-title', 'QA Snapshots')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">QA Snapshots</h2>
        <p class="admin-page-subtitle">
            Manage QA snapshot blocks shown in quality hero card
        </p>
    </div>

    @can('quality_snapshot_create')
        <a href="{{ route('admin.quality-snapshots.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Snapshot
        </a>
    @endcan
</div>

@if(session('success'))
    <div class="alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All QA Snapshots</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-QualitySnapshot">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($snapshots as $snapshot)
                    <tr data-entry-id="{{ $snapshot->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $snapshot->id }}</span></td>

                        <td>
                            <p class="table-main-text">{{ $snapshot->title }}</p>
                        </td>

                        <td style="color:#475569;">
                            {{ \Illuminate\Support\Str::limit($snapshot->description, 90) }}
                        </td>

                        <td><span class="id-text">{{ $snapshot->sort_order }}</span></td>

                        <td>
                            @if($snapshot->status)
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
                                @can('quality_snapshot_show')
                                    <a href="{{ route('admin.quality-snapshots.show', $snapshot->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                @endcan

                                @can('quality_snapshot_edit')
                                    <a href="{{ route('admin.quality-snapshots.edit', $snapshot->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                @endcan

                                @can('quality_snapshot_delete')
                                    <form action="{{ route('admin.quality-snapshots.destroy', $snapshot->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i> Delete
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
    initAdminDataTable('.datatable-QualitySnapshot', {
        canDelete: @can('quality_snapshot_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search snapshots...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ snapshots'
    });
});
</script>
@endsection