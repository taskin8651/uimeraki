@extends('layouts.admin')

@section('page-title', 'Add Resource Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resource-categories.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Resource Category</h2>
        <p class="admin-page-subtitle">
            Create a new filter/category for resources
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.resource-categories.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-tag"></i>
                </div>

                <div>
                    <p class="form-card-title">Category Information</p>
                    <p class="form-card-subtitle">Basic category details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Name <span class="req">*</span></label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           placeholder="Guides"
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
                           value="{{ old('slug') }}"
                           placeholder="guides"
                           class="field-input {{ $errors->has('slug') ? 'error' : '' }}">

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @else
                        <p class="field-hint">Blank chhodne par name se auto generate hoga.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text"
                           name="icon"
                           value="{{ old('icon') }}"
                           placeholder="bi bi-journal-text"
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
                           value="{{ old('sort_order', 0) }}"
                           min="0"
                           class="field-input">
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item checked" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" checked>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Category</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.resource-categories.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection