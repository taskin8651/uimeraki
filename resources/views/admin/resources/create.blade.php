@extends('layouts.admin')

@section('page-title', 'Add Resource')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resources.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Resource</h2>
        <p class="admin-page-subtitle">
            Create a new guide, note, case study, FAQ or download
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.resources.store') }}" enctype="multipart/form-data">
    @csrf

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
                           value="{{ old('title') }}"
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
                           value="{{ old('slug') }}"
                           class="field-input {{ $errors->has('slug') ? 'error' : '' }}">

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @else
                        <p class="field-hint">Blank chhodne par title se auto generate hoga.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Category</label>
                    <select name="resource_category_id" class="field-input">
                        <option value="">Select Category</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('resource_category_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Short Description</label>
                    <textarea name="short_description" rows="4" class="field-input">{{ old('short_description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Full Content</label>
                    <textarea name="content" rows="8" class="field-input">{{ old('content') }}</textarea>
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
                           value="{{ old('type_label') }}"
                           placeholder="Guide"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Type Icon</label>
                    <input type="text"
                           name="type_icon"
                           value="{{ old('type_icon') }}"
                           placeholder="bi bi-journal-text"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Main Icon</label>
                    <input type="text"
                           name="main_icon"
                           value="{{ old('main_icon') }}"
                           placeholder="bi bi-capsule-pill"
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
                            <option value="{{ $class }}" {{ old('media_color_class') == $class ? 'selected' : '' }}>
                                {{ $label }} — {{ $class }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Read Time / File Info</label>
                    <input type="text"
                           name="read_time"
                           value="{{ old('read_time') }}"
                           placeholder="7 min read"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Industry / Meta</label>
                    <input type="text"
                           name="industry_or_meta"
                           value="{{ old('industry_or_meta') }}"
                           placeholder="Pharma"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Tags</label>
                    <textarea name="tags" rows="3" class="field-input">{{ old('tags') }}</textarea>
                    <p class="field-hint">Comma separated. Example: Microns, Barrier, Forming</p>
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
                           value="{{ old('button_text') }}"
                           placeholder="Read article"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Button URL</label>
                    <input type="text"
                           name="button_url"
                           value="{{ old('button_url') }}"
                           placeholder="https://..."
                           class="field-input">
                    <p class="field-hint">PDF upload hoga to file link priority lega.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Resource Image</label>
                    <input type="file" name="resource_image" class="field-input" accept="image/*">
                </div>

                <div class="field-group">
                    <label class="field-label">Resource File / PDF</label>
                    <input type="file" name="resource_file" class="field-input" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
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
                           value="{{ old('sort_order', 0) }}"
                           min="0"
                           class="field-input">
                </div>

                <div class="form-info-box mb-3">
                    <p class="meta-label">Featured</p>

                    <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured') ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Featured Resource</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item checked" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" checked>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Resource</span>
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

        <a href="{{ route('admin.resources.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection