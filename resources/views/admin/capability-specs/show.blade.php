@extends('layouts.admin')

@section('page-title', 'Show Capability Specification')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capability-specs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Specification Details</h2>

        <p class="admin-page-subtitle">
            Full details for this capability specification
        </p>
    </div>

    <div class="show-actions">
        @can('capability_spec_edit')
            <a href="{{ route('admin.capability-specs.edit', $capabilitySpec->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan

        @can('capability_spec_delete')
            <form action="{{ route('admin.capability-specs.destroy', $capabilitySpec->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background:#0494E6;">
                    <i class="{{ $capabilitySpec->icon ?: 'fas fa-table' }}"></i>
                </div>

                <p class="profile-title">{{ $capabilitySpec->process }}</p>
                <p class="profile-subtitle">Capability Specification</p>

                @if($capabilitySpec->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Specification Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $capabilitySpec->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Process</span>
                    <span class="detail-value">{{ $capabilitySpec->process }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        @if($capabilitySpec->icon)
                            <i class="{{ $capabilitySpec->icon }}"></i>
                            {{ $capabilitySpec->icon }}
                        @else
                            —
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Range / Detail</span>
                    <span class="detail-value">{!! nl2br(e($capabilitySpec->range_detail ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Notes</span>
                    <span class="detail-value">{!! nl2br(e($capabilitySpec->notes ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $capabilitySpec->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($capabilitySpec->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($capabilitySpec->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection