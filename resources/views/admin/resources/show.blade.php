@extends('layouts.admin')

@section('page-title', 'Show Resource')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resources.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Resource Details</h2>
        <p class="admin-page-subtitle">
            Full details for this resource
        </p>
    </div>

    <div class="show-actions">
        @can('resource_edit')
            <a href="{{ route('admin.resources.edit', $resource->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan

        @can('resource_delete')
            <form action="{{ route('admin.resources.destroy', $resource->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                    <i class="{{ $resource->main_icon ?: 'fas fa-newspaper' }}"></i>
                </div>

                <p class="profile-title">{{ $resource->title }}</p>
                <p class="profile-subtitle">
                    {{ optional($resource->category)->name ?? 'No Category' }}
                </p>

                <div class="d-flex justify-content-center flex-wrap gap-2">
                    @if($resource->status)
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

                    @if($resource->is_featured)
                        <span class="status-pill success">
                            <i class="fas fa-star"></i>
                            Featured
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Media</p>

            @if($resource->getFirstMediaUrl('resource_image'))
                <img src="{{ $resource->getFirstMediaUrl('resource_image') }}"
                     alt="{{ $resource->title }}"
                     style="width:100%;height:180px;object-fit:cover;border-radius:14px;border:1px solid #E2E8F0;">
            @else
                <p class="text-muted small mb-0">No image uploaded.</p>
            @endif

            @if($resource->file_url)
                <a href="{{ $resource->file_url }}" target="_blank" class="quick-link primary mt-3">
                    <i class="fas fa-file-download"></i>
                    Open File / PDF
                </a>
            @endif
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Resource Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $resource->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $resource->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value code-pill">{{ $resource->slug }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Category</span>
                    <span class="detail-value">{{ optional($resource->category)->name ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Short Description</span>
                    <span class="detail-value">
                        {!! nl2br(e($resource->short_description ?? '—')) !!}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Type Label</span>
                    <span class="detail-value">{{ $resource->type_label ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Read Time / File Info</span>
                    <span class="detail-value">{{ $resource->read_time ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Industry / Meta</span>
                    <span class="detail-value">{{ $resource->industry_or_meta ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Tags</span>
                    <div class="tag-wrap">
                        @forelse($resource->tags_array as $tag)
                            <span class="role-tag">{{ $tag }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button</span>
                    <span class="detail-value">
                        {{ $resource->button_text ?? '—' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $resource->sort_order }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Full Content</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="detail-value" style="line-height:1.7;">
                    {!! nl2br(e($resource->content ?? '—')) !!}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection