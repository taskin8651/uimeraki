@extends('layouts.admin')

@section('page-title', 'Add Product')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Product</h2>

        <p class="admin-page-subtitle">
            Create a new product with main image, gallery and technical specifications
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-box-open"></i>
                </div>

                <div>
                    <p class="form-card-title">Product Information</p>
                    <p class="form-card-subtitle">Basic product details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Product Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-box icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Example: Blister Foil"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="slug">
                        Slug <span class="field-hint">(optional)</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               placeholder="Leave blank to auto generate"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="product_category_id">
                        Category <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="product_category_id"
                                id="product_category_id"
                                required
                                class="field-input {{ $errors->has('product_category_id') ? 'error' : '' }}">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('product_category_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('product_category_id') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">
                        Short Description
                    </label>

                    <textarea name="short_description"
                              id="short_description"
                              rows="3"
                              placeholder="Short product intro"
                              class="field-input {{ $errors->has('short_description') ? 'error' : '' }}">{{ old('short_description') }}</textarea>

                    @if($errors->has('short_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('short_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Full Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Detailed product description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
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
                    <p class="form-card-subtitle">Upload product images and display options</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="image">
                        Main Product Image
                    </label>

                    <input type="file"
                           name="image"
                           id="image"
                           accept="image/*"
                           class="field-input {{ $errors->has('image') ? 'error' : '' }}">

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @else
                        <p class="field-hint">Single image. JPG, PNG, WEBP allowed.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="gallery_images">
                        Gallery Images
                    </label>

                    <input type="file"
                           name="gallery_images[]"
                           id="gallery_images"
                           accept="image/*"
                           multiple
                           class="field-input {{ $errors->has('gallery_images') ? 'error' : '' }}">

                    @if($errors->has('gallery_images'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('gallery_images') }}
                        </p>
                    @else
                        <p class="field-hint">You can select multiple images.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               min="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Frontend Options</p>

                    <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured') ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Show in Featured Products</span>
                    </label>

                    <label class="role-checkbox-item checked" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               checked>

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
                <p class="form-card-subtitle">Product details used in cards and comparison table</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="meta-grid-2">

                <div class="field-group">
                    <label class="field-label" for="thickness">Thickness</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-ruler icon"></i>
                        <input type="text" name="thickness" id="thickness" value="{{ old('thickness') }}" placeholder="Example: 20–25µ" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="material_type">Material Type</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-cube icon"></i>
                        <input type="text" name="material_type" id="material_type" value="{{ old('material_type') }}" placeholder="Example: Hard alu" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="application">Application</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-industry icon"></i>
                        <input type="text" name="application" id="application" value="{{ old('application') }}" placeholder="Example: Tablets & Capsules" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="key_feature">Key Feature</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>
                        <input type="text" name="key_feature" id="key_feature" value="{{ old('key_feature') }}" placeholder="Example: Tight register printing" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="options">Options</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-list icon"></i>
                        <input type="text" name="options" id="options" value="{{ old('options') }}" placeholder="Example: Lacquer, up to 6 colors" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="badges">Badges</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tags icon"></i>
                        <input type="text" name="badges" id="badges" value="{{ old('badges') }}" placeholder="Example: Pharma, Hard alu" class="field-input">
                    </div>
                    <p class="field-hint">Comma separated values.</p>
                </div>

                <div class="field-group" style="grid-column: span 2;">
                    <label class="field-label" for="specs">Specs</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-clipboard-list icon"></i>
                        <input type="text" name="specs" id="specs" value="{{ old('specs') }}" placeholder="Example: 20–25µ, PVC/PVDC, Tight register" class="field-input">
                    </div>
                    <p class="field-hint">Comma separated values.</p>
                </div>

            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.products.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection