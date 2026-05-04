@extends('layouts.admin')

@section('page-title', 'Edit About Feature')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-features.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Feature</h2>

        <p class="admin-page-subtitle">
            Update Why Meraki feature card
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $aboutFeature->icon ?: 'fas fa-star' }}"></i>
        </div>

        <div>
            <p class="identity-title">{{ $aboutFeature->title }}</p>
            <p class="identity-subtitle">ID #{{ $aboutFeature->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-features.update', $aboutFeature->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <p class="form-card-title">Feature Information</p>
                    <p class="form-card-subtitle">Update icon, title and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title', $aboutFeature->title) }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon">Icon Class</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', $aboutFeature->icon) }}" class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('icon') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>

                    <textarea name="description" id="description" rows="5" class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $aboutFeature->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('description') }}</p>
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
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $aboutFeature->sort_order) }}" min="0" class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('sort_order') }}</p>
                    @endif
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item {{ old('status', $aboutFeature->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $aboutFeature->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Feature</span>
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

            <a href="{{ route('admin.about-features.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('about_feature_delete')
            <button type="submit" form="delete-feature-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Feature
            </button>
        @endcan
    </div>
</form>

@can('about_feature_delete')
    <form id="delete-feature-form" action="{{ route('admin.about-features.destroy', $aboutFeature->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @csrf
        @method('DELETE')
    </form>
@endcan

@endsection