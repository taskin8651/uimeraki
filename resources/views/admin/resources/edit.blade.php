@extends('layouts.admin')

@section('page-title', 'Edit Resource')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resources.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Resource</h2>
        <p class="admin-page-subtitle">
            Update guide, note, case study, FAQ or download
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $resource->main_icon ?: 'fas fa-newspaper' }}"></i>
        </div>

        <div>
            <p class="identity-title">{{ $resource->title }}</p>
            <p class="identity-subtitle">ID #{{ $resource->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.resources.update', $resource->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-newspaper"></i>
                </div>

                <div>
                    <p class="form-card-title">Resource Information</p>
                    <p class="form-card-subtitle">Basic content details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text"
                           name="title"
                           value="{{ old('title', $resource->title) }}"
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
                    <label class="field-label">Slug</label>
                    <input type="text"
                           name="slug"
                           value="{{ old('slug', $resource->slug) }}"
                           class="field-input {{ $errors->has('slug') ? 'error' : '' }}">

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Category</label>
                    <select name="resource_category_id" class="field-input">
                        <option value="">Select Category</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('resource_category_id', $resource->resource_category_id) == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Short Description</label>
                    <textarea name="short_description" rows="4" class="field-input">{{ old('short_description', $resource->short_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Full Content</label>
                    <textarea name="content" rows="8" class="field-input">{{ old('content', $resource->content) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-palette"></i>
                </div>

                <div>
                    <p class="form-card-title">Card UI Settings</p>
                    <p class="form-card-subtitle">Icons, type and color class</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Type Label</label>
                    <input type="text"
                           name="type_label"
                           value="{{ old('type_label', $resource->type_label) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Type Icon</label>
                    <input type="text"
                           name="type_icon"
                           value="{{ old('type_icon', $resource->type_icon) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Main Icon</label>
                    <input type="text"
                           name="main_icon"
                           value="{{ old('main_icon', $resource->main_icon) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Media Color Class</label>

                    <select name="media_color_class" class="field-input">
                        @php
                            $colors = [
                                'mres-card-media' => 'Default',
                                'mres-card-media-green' => 'Green',
                                'mres-card-media-blue' => 'Blue',
                                'mres-card-media-gold' => 'Gold',
                                'mres-card-media-purple' => 'Purple',
                                'mres-card-media-teal' => 'Teal',
                            ];
                        @endphp

                        @foreach($colors as $class => $label)
                            <option value="{{ $class }}" {{ old('media_color_class', $resource->media_color_class) == $class ? 'selected' : '' }}>
                                {{ $label }} — {{ $class }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Read Time / File Info</label>
                    <input type="text"
                           name="read_time"
                           value="{{ old('read_time', $resource->read_time) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Industry / Meta</label>
                    <input type="text"
                           name="industry_or_meta"
                           value="{{ old('industry_or_meta', $resource->industry_or_meta) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Tags</label>
                    <textarea name="tags" rows="3" class="field-input">{{ old('tags', $resource->tags) }}</textarea>
                    <p class="field-hint">Comma separated tags.</p>
                </div>

            </div>
        </div>

    </div>

    <div class="admin-form-grid mt-3">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-link"></i>
                </div>

                <div>
                    <p class="form-card-title">CTA & Uploads</p>
                    <p class="form-card-subtitle">Button, image and downloadable file</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Button Text</label>
                    <input type="text"
                           name="button_text"
                           value="{{ old('button_text', $resource->button_text) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button URL</label>
                    <input type="text"
                           name="button_url"
                           value="{{ old('button_url', $resource->button_url) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Current Image</label>

                    @if($resource->getFirstMediaUrl('resource_image'))
                        <div class="current-image-box mb-2">
                            <img src="{{ $resource->getFirstMediaUrl('resource_image') }}"
                                 alt="{{ $resource->title }}"
                                 style="width:140px;height:90px;object-fit:cover;border-radius:10px;border:1px solid #E2E8F0;">
                        </div>

                        <label class="role-checkbox-item" style="max-width:220px;">
                            <input type="checkbox" name="remove_image" value="1" class="role-checkbox">
                            <div class="check-icon"></div>
                            <span class="checkbox-text">Remove Image</span>
                        </label>
                    @else
                        <p class="field-hint">No image uploaded.</p>
                    @endif

                    <input type="file" name="resource_image" class="field-input mt-2" accept="image/*">
                </div>

                <div class="field-group">
                    <label class="field-label">Current File</label>

                    @if($resource->file_url)
                        <p class="field-hint">
                            <a href="{{ $resource->file_url }}" target="_blank">Open uploaded file</a>
                        </p>

                        <label class="role-checkbox-item" style="max-width:220px;">
                            <input type="checkbox" name="remove_file" value="1" class="role-checkbox">
                            <div class="check-icon"></div>
                            <span class="checkbox-text">Remove File</span>
                        </label>
                    @else
                        <p class="field-hint">No file uploaded.</p>
                    @endif

                    <input type="file" name="resource_file" class="field-input mt-2" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
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
                    <p class="form-card-subtitle">Featured, sort and status</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', $resource->sort_order) }}"
                           min="0"
                           class="field-input">
                </div>

                <div class="form-info-box mb-3">
                    <p class="meta-label">Featured</p>

                    <label class="role-checkbox-item {{ old('is_featured', $resource->is_featured) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $resource->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Featured Resource</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item {{ old('status', $resource->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $resource->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Resource</span>
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

            <a href="{{ route('admin.resources.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('resource_delete')
            <button type="submit" form="delete-resource-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Resource
            </button>
        @endcan
    </div>
</form>

@can('resource_delete')
    <form id="delete-resource-form"
          action="{{ route('admin.resources.destroy', $resource->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @csrf
        @method('DELETE')
    </form>
@endcan

@endsection