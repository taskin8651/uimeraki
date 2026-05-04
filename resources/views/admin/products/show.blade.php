@extends('layouts.admin')

@section('page-title', 'Show Product')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Product Details</h2>

        <p class="admin-page-subtitle">
            Full details for this product
        </p>
    </div>

    <div class="show-actions">
        @can('product_edit')
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Product
            </a>
        @endcan

        @can('product_delete')
            <form action="{{ route('admin.products.destroy', $product->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

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
                <div style="width:100%;height:220px;border-radius:20px;overflow:hidden;background:#F8FAFC;border:1px solid #E2E8F0;margin-bottom:16px;">
                    <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:cover;">
                </div>

                <p class="profile-title">{{ $product->name }}</p>
                <p class="profile-subtitle">{{ $product->category?->name ?? 'No Category' }}</p>

                @if($product->status)
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

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Product ID</p>
                        <p class="stat-mini-value">#{{ $product->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Gallery</p>
                        <p class="stat-mini-value">{{ $product->gallery_images->count() }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($product->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if($product->gallery_images->count())
            <div class="detail-card detail-card-pad">
                <p class="quick-title">Gallery Images</p>

                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    @foreach($product->gallery_images as $media)
                        <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" style="width:100%;height:95px;object-fit:cover;border-radius:14px;border:1px solid #E2E8F0;">
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-box-open"></i>
                </div>

                <p class="detail-section-title">Product Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $product->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $product->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $product->slug }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Category</span>
                    <span class="detail-value">{{ $product->category?->name ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Short Description</span>
                    <span class="detail-value">{{ $product->short_description ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{!! nl2br(e($product->description ?? '—')) !!}</span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-cogs"></i>
                </div>

                <p class="detail-section-title">Technical Specifications</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Thickness</span>
                    <span class="detail-value">{{ $product->thickness ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Material Type</span>
                    <span class="detail-value">{{ $product->material_type ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Application</span>
                    <span class="detail-value">{{ $product->application ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Key Feature</span>
                    <span class="detail-value">{{ $product->key_feature ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Options</span>
                    <span class="detail-value">{{ $product->options ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badges</span>
                    <div class="tag-wrap">
                        @forelse($product->badges_array as $badge)
                            <span class="role-tag">{{ $badge }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Specs</span>
                    <div class="tag-wrap">
                        @forelse($product->specs_array as $spec)
                            <span class="mini-permission">{{ $spec }}</span>
                        @empty
                            <span class="detail-value">—</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <p class="detail-section-title">Display Settings</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Featured</span>

                    @if($product->is_featured)
                        <span class="status-pill success">
                            <i class="fas fa-star"></i>
                            Featured
                        </span>
                    @else
                        <span class="detail-value">No</span>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($product->status)
                        <span class="status-pill success">Active</span>
                    @else
                        <span class="status-pill warning">Inactive</span>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $product->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($product->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($product->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection