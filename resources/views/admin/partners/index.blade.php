@extends('layouts.admin')

@section('page-title', 'Partners')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Partners</h2>
        <p class="admin-page-subtitle">
            Manage partner title and image
        </p>
    </div>

    @can('partner_create')
        <a href="{{ route('admin.partners.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Partner
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
        <p class="stat-label">Total Partners</p>
        <p class="stat-value">{{ $partners->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $partners->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $partners->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $partners->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Partners</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            These partners appear on website partner section
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Partner">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Partner</th>
                    <th>Image</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($partners as $partner)
                    <tr data-entry-id="{{ $partner->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $partner->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0494E6;">
                                    @if($partner->getFirstMediaUrl('partner_image'))
                                        <img src="{{ $partner->image_url }}"
                                             alt="{{ $partner->title }}"
                                             style="width:100%;height:100%;object-fit:contain;border-radius:50%;background:#fff;padding:5px;">
                                    @else
                                        <i class="fas fa-handshake"></i>
                                    @endif
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $partner->title }}</p>
                                    <p class="table-sub-text">
                                        Created {{ optional($partner->created_at)->format('d M Y') ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($partner->getFirstMediaUrl('partner_image'))
                                <img src="{{ $partner->image_url }}"
                                     alt="{{ $partner->title }}"
                                     style="width:90px;height:55px;object-fit:contain;border:1px solid #E2E8F0;border-radius:10px;background:#fff;padding:6px;">
                            @else
                                <span style="font-size:12px; color:#94A3B8;">No Image</span>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $partner->sort_order }}</span>
                        </td>

                        <td>
                            @if($partner->status)
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
                                @can('partner_edit')
                                    <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('partner_delete')
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}"
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
    initAdminDataTable('.datatable-Partner', {
        canDelete: @can('partner_delete') true @else false @endcan,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search partners...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ partners'
    });
});
</script>
@endsection