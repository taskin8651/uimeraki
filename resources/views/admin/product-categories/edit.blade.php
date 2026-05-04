@extends('layouts.admin')

@section('page-title', 'Edit Product Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.product-categories.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Product Category</h2>

        <p class="admin-page-subtitle">
            Update category details and display settings
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $productCategory->icon ?: 'fas fa-layer-group' }}"></i>
        </div>

        <div>
            <p class="identity-title">{{ $productCategory->name }}</p>
            <p class="identity-subtitle">ID #{{ $productCategory->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.product-categories.update', $productCategory->id) }}">
    @method('PUT')
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <p class="form-card-title">Category Information</p>
                    <p class="form-card-subtitle">Update category details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Category Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $productCategory->name) }}"
                               required
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
                        Slug
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug', $productCategory->slug) }}"
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
                    <label class="field-label" for="icon">
                        Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="icon"
                               id="icon"
                               value="{{ old('icon', $productCategory->icon) }}"
                               placeholder="Example: fas fa-capsules"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Display Settings</p>
                    <p class="form-card-subtitle">Update visibility and ordering</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $productCategory->sort_order) }}"
                               min="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item {{ old('status', $productCategory->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $productCategory->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active Category</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                {{ trans('global.save') }}
            </button>

            <a href="{{ route('admin.product-categories.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('product_category_delete')
            <button type="submit"
                    form="delete-category-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Category
            </button>
        @endcan
    </div>
</form>

@can('product_category_delete')
    <form id="delete-category-form"
          action="{{ route('admin.product-categories.destroy', $productCategory->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection