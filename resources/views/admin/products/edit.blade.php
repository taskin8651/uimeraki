@extends('layouts.admin')

@section('page-title', 'Edit Product')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Product</h2>

        <p class="admin-page-subtitle">
            Update product details, images and specifications
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="fas fa-box-open"></i>
        </div>

        <div>
            <p class="identity-title">{{ $product->name }}</p>
            <p class="identity-subtitle">ID #{{ $product->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <p class="form-card-title">Product Information</p>
                    <p class="form-card-subtitle">Update basic product details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">Product Name <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-box icon"></i>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="slug">Slug</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('slug') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="product_category_id">Category <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="product_category_id" id="product_category_id" required class="field-input {{ $errors->has('product_category_id') ? 'error' : '' }}">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('product_category_id'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('product_category_id') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">Short Description</label>

                    <textarea name="short_description" id="short_description" rows="3" class="field-input">{{ old('short_description', $product->short_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Full Description</label>

                    <textarea name="description" id="description" rows="5" class="field-input">{{ old('description', $product->description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Media & Visibility</p>
                    <p class="form-card-subtitle">Update images and display status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Current Main Image</label>

                    <div style="width:160px;height:110px;border-radius:16px;overflow:hidden;border:1px solid #E2E8F0;background:#F8FAFC;">
                        <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">Replace Main Image</label>
                    <input type="file" name="image" id="image" accept="image/*" class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                    <p class="field-hint">Uploading new image will replace old main image.</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="gallery_images">Add Gallery Images</label>
                    <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple class="field-input">
                    <p class="field-hint">New images will be added to existing gallery.</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $product->sort_order) }}" min="0" class="field-input">
                    </div>
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Frontend Options</p>

                    <label class="role-checkbox-item {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox" name="is_featured" value="1" class="role-checkbox" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Show in Featured Products</span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', $product->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $product->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Product</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-card mt-3">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-cogs"></i>
            </div>

            <div>
                <p class="form-card-title">Technical Specifications</p>
                <p class="form-card-subtitle">Update product card and comparison details</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="meta-grid-2">

                <div class="field-group">
                    <label class="field-label">Thickness</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-ruler icon"></i>
                        <input type="text" name="thickness" value="{{ old('thickness', $product->thickness) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Material Type</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-cube icon"></i>
                        <input type="text" name="material_type" value="{{ old('material_type', $product->material_type) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Application</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-industry icon"></i>
                        <input type="text" name="application" value="{{ old('application', $product->application) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Key Feature</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>
                        <input type="text" name="key_feature" value="{{ old('key_feature', $product->key_feature) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Options</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-list icon"></i>
                        <input type="text" name="options" value="{{ old('options', $product->options) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Badges</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tags icon"></i>
                        <input type="text" name="badges" value="{{ old('badges', $product->badges) }}" class="field-input">
                    </div>
                    <p class="field-hint">Comma separated values.</p>
                </div>

                <div class="field-group" style="grid-column: span 2;">
                    <label class="field-label">Specs</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-clipboard-list icon"></i>
                        <input type="text" name="specs" value="{{ old('specs', $product->specs) }}" class="field-input">
                    </div>
                    <p class="field-hint">Comma separated values.</p>
                </div>

            </div>
        </div>
    </div>

    @if($product->gallery_images->count())
        <div class="form-card mt-3">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-photo-video"></i>
                </div>

                <div>
                    <p class="form-card-title">Gallery Images</p>
                    <p class="form-card-subtitle">Remove unwanted gallery images</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="d-grid gap-3" style="grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));">
                    @foreach($product->gallery_images as $media)
                        <div style="position:relative;border:1px solid #E2E8F0;border-radius:16px;overflow:hidden;background:#fff;">
                            <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" style="width:100%;height:120px;object-fit:cover;display:block;">

                            <form action="{{ route('admin.products.gallery-image.delete', $media->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this gallery image?')"
                                  style="position:absolute;top:7px;right:7px;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-danger" style="width:32px;height:32px;padding:0;border-radius:10px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                {{ trans('global.save') }}
            </button>

            <a href="{{ route('admin.products.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('product_delete')
            <button type="submit"
                    form="delete-product-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Product
            </button>
        @endcan
    </div>
</form>

@can('product_delete')
    <form id="delete-product-form"
          action="{{ route('admin.products.destroy', $product->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection