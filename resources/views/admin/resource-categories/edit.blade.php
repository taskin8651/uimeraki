@extends('layouts.admin')

@section('page-title', 'Edit Resource Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resource-categories.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Resource Category</h2>
        <p class="admin-page-subtitle">
            Update resource category details
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $resourceCategory->icon ?: 'fas fa-tag' }}"></i>
        </div>

        <div>
            <p class="identity-title">{{ $resourceCategory->name }}</p>
            <p class="identity-subtitle">ID #{{ $resourceCategory->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.resource-categories.update', $resourceCategory->id) }}">
    @csrf
    @method('PUT')

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
                    <label class="field-label">Name <span class="req">*</span></label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $resourceCategory->name) }}"
                           required
                           class="field-input {{ $errors->has('name') ? 'error' : '' }}">

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Slug</label>
                    <input type="text"
                           name="slug"
                           value="{{ old('slug', $resourceCategory->slug) }}"
                           class="field-input {{ $errors->has('slug') ? 'error' : '' }}">

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text"
                           name="icon"
                           value="{{ old('icon', $resourceCategory->icon) }}"
                           class="field-input">
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
                    <p class="form-card-subtitle">Sort and status</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', $resourceCategory->sort_order) }}"
                           min="0"
                           class="field-input">
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item {{ old('status', $resourceCategory->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $resourceCategory->status) ? 'checked' : '' }}>

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

            <a href="{{ route('admin.resource-categories.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('resource_category_delete')
            <button type="submit" form="delete-resource-category-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Category
            </button>
        @endcan
    </div>
</form>

@can('resource_category_delete')
    <form id="delete-resource-category-form"
          action="{{ route('admin.resource-categories.destroy', $resourceCategory->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @csrf
        @method('DELETE')
    </form>
@endcan

@endsection