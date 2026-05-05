@extends('layouts.admin')

@section('page-title', 'Edit Partner')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.partners.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Partner</h2>
        <p class="admin-page-subtitle">Update partner title and image</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.partners.update', $partner->id) }}" enctype="multipart/form-data">
    @method('PUT')
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
                           value="{{ old('title', $partner->title) }}"
                           required
                           class="field-input {{ $errors->has('title') ? 'error' : '' }}">

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Partner Image</label>

                    @if($partner->getFirstMediaUrl('partner_image'))
                        <div class="mb-2">
                            <img src="{{ $partner->image_url }}"
                                 alt="{{ $partner->title }}"
                                 style="width:120px;height:80px;object-fit:contain;border:1px solid #E2E8F0;border-radius:12px;background:#fff;padding:8px;">
                        </div>

                        <label class="role-checkbox-item" style="max-width:220px;margin-bottom:10px;">
                            <input type="checkbox" name="remove_image" value="1" class="role-checkbox">
                            <div class="check-icon"></div>
                            <span class="checkbox-text">Remove Image</span>
                        </label>
                    @endif

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
                           value="{{ old('sort_order', $partner->sort_order) }}"
                           class="field-input">
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Visibility</p>

                    <label class="role-checkbox-item {{ old('status', $partner->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $partner->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                Save Partner
            </button>

            <a href="{{ route('admin.partners.index') }}" class="btn-ghost">
                Cancel
            </a>
        </div>

        @can('partner_delete')
            <button type="submit"
                    form="delete-partner-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Partner
            </button>
        @endcan
    </div>
</form>

@can('partner_delete')
    <form id="delete-partner-form"
          action="{{ route('admin.partners.destroy', $partner->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection