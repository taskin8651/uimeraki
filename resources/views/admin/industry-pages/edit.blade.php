@extends('layouts.admin')

@section('page-title', 'Edit Industry Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.industry-pages.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Industry Page</h2>

        <p class="admin-page-subtitle">
            Update industries page content and hero image
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="fas fa-industry"></i>
        </div>

        <div>
            <p class="identity-title">Industry Page</p>
            <p class="identity-subtitle">ID #{{ $industryPage->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.industry-pages.update', $industryPage->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-home"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Section</p>
                    <p class="form-card-subtitle">Main industries page banner content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="hero_eyebrow">Hero Eyebrow</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="hero_eyebrow" id="hero_eyebrow"
                               value="{{ old('hero_eyebrow', $industryPage->hero_eyebrow) }}"
                               class="field-input {{ $errors->has('hero_eyebrow') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('hero_eyebrow'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_eyebrow') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_title">Hero Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-text-width icon"></i>
                        <input type="text" name="hero_title" id="hero_title"
                               value="{{ old('hero_title', $industryPage->hero_title) }}"
                               class="field-input {{ $errors->has('hero_title') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('hero_title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_highlight">Hero Highlight</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-highlighter icon"></i>
                        <input type="text" name="hero_highlight" id="hero_highlight"
                               value="{{ old('hero_highlight', $industryPage->hero_highlight) }}"
                               class="field-input {{ $errors->has('hero_highlight') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('hero_highlight'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_highlight') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_description">Hero Description</label>
                    <textarea name="hero_description" id="hero_description" rows="4"
                              class="field-input {{ $errors->has('hero_description') ? 'error' : '' }}">{{ old('hero_description', $industryPage->hero_description) }}</textarea>
                    @if($errors->has('hero_description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_description') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_chips">Hero Chips</label>
                    <textarea name="hero_chips" id="hero_chips" rows="3"
                              placeholder="Pharma, Food & Dairy, Cosmetics, Confectionery"
                              class="field-input {{ $errors->has('hero_chips') ? 'error' : '' }}">{{ old('hero_chips', $industryPage->hero_chips) }}</textarea>
                    <p class="field-hint">Comma separated. Example: Pharma, Food & Dairy, Cosmetics</p>
                    @if($errors->has('hero_chips'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_chips') }}</p>
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
                    <p class="form-card-title">Hero Image & Status</p>
                    <p class="form-card-subtitle">Upload page hero image</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Current Hero Image</label>
                    <div style="width:220px;height:140px;border-radius:16px;overflow:hidden;border:1px solid #E2E8F0;background:#F8FAFC;">
                        <img src="{{ $industryPage->hero_image_url }}" alt="Hero" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_image">Replace Hero Image</label>
                    <input type="file" name="hero_image" id="hero_image" accept="image/*"
                           class="field-input {{ $errors->has('hero_image') ? 'error' : '' }}">
                    @if($errors->has('hero_image'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_image') }}</p>
                    @else
                        <p class="field-hint">JPG, PNG, WEBP allowed.</p>
                    @endif
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item {{ old('status', $industryPage->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $industryPage->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Industry Page</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-card mt-3">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-layer-group"></i>
            </div>

            <div>
                <p class="form-card-title">Industries Section</p>
                <p class="form-card-subtitle">Grid section heading content</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="meta-grid-2">
                <div class="field-group">
                    <label class="field-label" for="section_eyebrow">Section Eyebrow</label>
                    <input type="text" name="section_eyebrow" id="section_eyebrow"
                           value="{{ old('section_eyebrow', $industryPage->section_eyebrow) }}"
                           class="field-input {{ $errors->has('section_eyebrow') ? 'error' : '' }}">
                    @if($errors->has('section_eyebrow'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('section_eyebrow') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="section_title">Section Title</label>
                    <input type="text" name="section_title" id="section_title"
                           value="{{ old('section_title', $industryPage->section_title) }}"
                           class="field-input {{ $errors->has('section_title') ? 'error' : '' }}">
                    @if($errors->has('section_title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('section_title') }}</p>
                    @endif
                </div>

                <div class="field-group" style="grid-column: span 2;">
                    <label class="field-label" for="section_description">Section Description</label>
                    <textarea name="section_description" id="section_description" rows="4"
                              class="field-input {{ $errors->has('section_description') ? 'error' : '' }}">{{ old('section_description', $industryPage->section_description) }}</textarea>
                    @if($errors->has('section_description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('section_description') }}</p>
                    @endif
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

            <a href="{{ route('admin.industry-pages.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </div>

</form>

@endsection