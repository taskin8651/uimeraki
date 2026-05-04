@extends('layouts.admin')

@section('page-title', 'Edit Industry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.industries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Industry</h2>

        <p class="admin-page-subtitle">
            Update industry card details
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $industry->badge_icon ?: 'fas fa-industry' }}"></i>
        </div>

        <div>
            <p class="identity-title">{{ $industry->title }}</p>
            <p class="identity-subtitle">ID #{{ $industry->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.industries.update', $industry->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <p class="form-card-title">Industry Information</p>
                    <p class="form-card-subtitle">Update card details</p>
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
                               value="{{ old('title', $industry->title) }}"
                               required
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
                    <label class="field-label" for="slug">Slug</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug', $industry->slug) }}"
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
                    <label class="field-label" for="description">Description</label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $industry->description) }}</textarea>

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
                              class="field-input {{ $errors->has('tags') ? 'error' : '' }}">{{ old('tags', $industry->tags) }}</textarea>

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
                    <p class="form-card-subtitle">Update image, badge and ordering</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Current Image</label>

                    <div style="width:180px;height:120px;border-radius:16px;overflow:hidden;border:1px solid #E2E8F0;background:#F8FAFC;">
                        <img src="{{ $industry->image_url }}" alt="{{ $industry->title }}" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">Replace Image</label>

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
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_icon">Badge Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="badge_icon"
                               id="badge_icon"
                               value="{{ old('badge_icon', $industry->badge_icon) }}"
                               class="field-input {{ $errors->has('badge_icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('badge_icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_icon') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_text">Badge Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="badge_text"
                               id="badge_text"
                               value="{{ old('badge_text', $industry->badge_text) }}"
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
                               value="{{ old('sort_order', $industry->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $industry->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $industry->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Industry</span>
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

            <a href="{{ route('admin.industries.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('industry_delete')
            <button type="submit" form="delete-industry-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Industry
            </button>
        @endcan
    </div>

</form>

@can('industry_delete')
    <form id="delete-industry-form"
          action="{{ route('admin.industries.destroy', $industry->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @csrf
        @method('DELETE')
    </form>
@endcan

@endsection