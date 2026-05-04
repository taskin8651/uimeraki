@extends('layouts.admin')

@section('page-title', 'Quality Pillars')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Quality Pillars</h2>
        <p class="admin-page-subtitle">
            Manage quality system cards
        </p>
    </div>

    @can('quality_pillar_create')
        <a href="{{ route('admin.quality-pillars.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Pillar
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
        <p class="page-card-title">All Quality Pillars</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-QualityPillar">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Pillar</th>
                    <th>Points</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pillars as $pillar)
                    <tr data-entry-id="{{ $pillar->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $pillar->id }}</span></td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    <i class="{{ $pillar->icon ?: 'fas fa-shield-alt' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $pillar->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($pillar->description, 80) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="tag-wrap">
                                @foreach($pillar->points_array as $point)
                                    <span class="role-tag">{{ $point }}</span>
                                @endforeach
                            </div>
                        </td>

                        <td><span class="id-text">{{ $pillar->sort_order }}</span></td>

                        <td>
                            @if($pillar->status)
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
                                @can('quality_pillar_show')
                                    <a href="{{ route('admin.quality-pillars.show', $pillar->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                @endcan

                                @can('quality_pillar_edit')
                                    <a href="{{ route('admin.quality-pillars.edit', $pillar->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                @endcan

                                @can('quality_pillar_delete')
                                    <form action="{{ route('admin.quality-pillars.destroy', $pillar->id) }}"
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
    initAdminDataTable('.datatable-QualityPillar', {
        canDelete: @can('quality_pillar_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search pillars...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ pillars'
    });
});
</script>
@endsection