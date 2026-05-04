@extends('layouts.admin')

@section('page-title', 'About Timelines')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Timelines</h2>
        <p class="admin-page-subtitle">
            Manage journey timeline items on about page
        </p>
    </div>

    @can('about_timeline_create')
        <a href="{{ route('admin.about-timelines.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Timeline
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
        <p class="stat-label">Total Timelines</p>
        <p class="stat-value">{{ $timelines->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $timelines->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $timelines->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $timelines->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Timeline Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Sort order controls frontend sequence
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutTimeline">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Timeline</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($timelines as $timeline)
                    <tr data-entry-id="{{ $timeline->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $timeline->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    {{ $loop->iteration }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $timeline->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($timeline->description, 80) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="id-text">{{ $timeline->sort_order }}</span>
                        </td>

                        <td>
                            @if($timeline->status)
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
                                @can('about_timeline_show')
                                    <a href="{{ route('admin.about-timelines.show', $timeline->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('about_timeline_edit')
                                    <a href="{{ route('admin.about-timelines.edit', $timeline->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('about_timeline_delete')
                                    <form action="{{ route('admin.about-timelines.destroy', $timeline->id) }}"
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
    initAdminDataTable('.datatable-AboutTimeline', {
        canDelete: @can('about_timeline_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search timeline...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ timeline items'
    });
});
</script>
@endsection