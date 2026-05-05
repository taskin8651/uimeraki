@extends('layouts.admin')

@section('page-title', 'Add Partner')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.partners.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Partner</h2>
        <p class="admin-page-subtitle">Add partner title and image</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-handshake"></i>
                </div>

                <div>
                    <p class="form-card-title">Partner Details</p>
                    <p class="form-card-subtitle">Basic partner information</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">
                        Title <span class="req">*</span>
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           required
                           class="field-input {{ $errors->has('title') ? 'error' : '' }}"
                           placeholder="Partner name">

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Partner Image</label>

                    <input type="file"
                           name="partner_image"
                           class="field-input {{ $errors->has('partner_image') ? 'error' : '' }}"
                           accept="image/*">

                    @if($errors->has('partner_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('partner_image') }}
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
                    <p class="form-card-title">Settings</p>
                    <p class="form-card-subtitle">Order and visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Sort Order</label>

                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', 0) }}"
                           class="field-input">
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Visibility</p>

                    <label class="role-checkbox-item {{ old('status', 1) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', 1) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save Partner
        </button>

        <a href="{{ route('admin.partners.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection