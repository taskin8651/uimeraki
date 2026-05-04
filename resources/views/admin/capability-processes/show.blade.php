@extends('layouts.admin')

@section('page-title', 'Show Capability Process Step')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capability-processes.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Process Step Details</h2>

        <p class="admin-page-subtitle">
            Full details for this capability process step
        </p>
    </div>

    <div class="show-actions">
        @can('capability_process_edit')
            <a href="{{ route('admin.capability-processes.edit', $capabilityProcess->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan

        @can('capability_process_delete')
            <form action="{{ route('admin.capability-processes.destroy', $capabilityProcess->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                    <i class="{{ $capabilityProcess->icon ?: 'fas fa-project-diagram' }}"></i>
                </div>

                <p class="profile-title">{{ $capabilityProcess->title }}</p>
                <p class="profile-subtitle">Capability Process Step</p>

                @if($capabilityProcess->status)
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

                <p class="detail-section-title">Process Step Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $capabilityProcess->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $capabilityProcess->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        @if($capabilityProcess->icon)
                            <i class="{{ $capabilityProcess->icon }}"></i>
                            {{ $capabilityProcess->icon }}
                        @else
                            —
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{!! nl2br(e($capabilityProcess->description ?? '—')) !!}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $capabilityProcess->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($capabilityProcess->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($capabilityProcess->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection