@extends('layouts.admin')

@section('page-title', 'Edit Capability')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capabilities.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Capability</h2>

        <p class="admin-page-subtitle">
            Update capability card details
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $capability->badge_icon ?: 'fas fa-cogs' }}"></i>
        </div>

        <div>
            <p class="identity-title">{{ $capability->title }}</p>
            <p class="identity-subtitle">ID #{{ $capability->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.capabilities.update', $capability->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

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

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $capability->title) }}"
                               required
                               placeholder="Rotogravure Printing"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
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

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Capability description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $capability->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="tags">Tags</label>

                    <textarea name="tags"
                              id="tags"
                              rows="3"
                              placeholder="6 colors, Register, Brand-safe"
                              class="field-input {{ $errors->has('tags') ? 'error' : '' }}">{{ old('tags', $capability->tags) }}</textarea>

                    <p class="field-hint">Comma separated tags.</p>

                    @if($errors->has('tags'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('tags') }}
                        </p>
                    @endif
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
                    <label class="field-label">Current Image</label>

                    <div style="width:180px;height:115px;border-radius:16px;overflow:hidden;border:1px solid #E2E8F0;background:#F8FAFC;">
                        <img src="{{ $capability->image_url }}"
                             alt="{{ $capability->title }}"
                             style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">Replace Capability Image</label>

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
                        <p class="field-hint">JPG, PNG, WEBP allowed. Leave blank to keep current image.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_icon">Badge Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="badge_icon"
                               id="badge_icon"
                               value="{{ old('badge_icon', $capability->badge_icon) }}"
                               placeholder="bi bi-printer"
                               class="field-input {{ $errors->has('badge_icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('badge_icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_icon') }}
                        </p>
                    @else
                        <p class="field-hint">Example: bi bi-printer, bi bi-droplet-half, bi bi-layers</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_text">Badge Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="badge_text"
                               id="badge_text"
                               value="{{ old('badge_text', $capability->badge_text) }}"
                               placeholder="Printing"
                               class="field-input {{ $errors->has('badge_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('badge_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $capability->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $capability->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $capability->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active Capability</span>
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

            <a href="{{ route('admin.capabilities.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('capability_delete')
            <button type="submit"
                    form="delete-capability-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Capability
            </button>
        @endcan
    </div>

</form>

@can('capability_delete')
    <form id="delete-capability-form"
          action="{{ route('admin.capabilities.destroy', $capability->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @csrf
        @method('DELETE')
    </form>
@endcan

@endsection