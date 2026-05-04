@extends('layouts.admin')

@section('page-title', 'Add Capability')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capabilities.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Capability</h2>

        <p class="admin-page-subtitle">
            Create a new capability card
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.capabilities.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-cogs"></i>
                </div>

                <div>
                    <p class="form-card-title">Capability Information</p>
                    <p class="form-card-subtitle">Basic card details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Rotogravure Printing" class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="5" placeholder="Capability description" class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="tags">Tags</label>
                    <textarea name="tags" id="tags" rows="3" placeholder="6 colors, Register, Brand-safe" class="field-input">{{ old('tags') }}</textarea>
                    <p class="field-hint">Comma separated tags.</p>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Media & Display</p>
                    <p class="form-card-subtitle">Image, badge and ordering</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="image">Capability Image</label>
                    <input type="file" name="image" id="image" accept="image/*" class="field-input {{ $errors->has('image') ? 'error' : '' }}">

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @else
                        <p class="field-hint">JPG, PNG, WEBP allowed.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_icon">Badge Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="badge_icon" id="badge_icon" value="{{ old('badge_icon') }}" placeholder="bi bi-printer" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_text">Badge Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="badge_text" id="badge_text" value="{{ old('badge_text') }}" placeholder="Printing" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="field-input">
                    </div>
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item checked" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" checked>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Capability</span>
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

        <a href="{{ route('admin.capabilities.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection