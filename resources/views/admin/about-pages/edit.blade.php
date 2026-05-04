@extends('layouts.admin')

@section('page-title', 'Edit About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-pages.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit About Page</h2>

        <p class="admin-page-subtitle">
            Update complete about page content
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="fas fa-info-circle"></i>
        </div>

        <div>
            <p class="identity-title">About Page</p>
            <p class="identity-subtitle">ID #{{ $aboutPage->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-pages.update', $aboutPage->id) }}" enctype="multipart/form-data">
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
                    <p class="form-card-subtitle">Main top section content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Hero Eyebrow</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="hero_eyebrow" value="{{ old('hero_eyebrow', $aboutPage->hero_eyebrow) }}" class="field-input {{ $errors->has('hero_eyebrow') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('hero_eyebrow'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('hero_eyebrow') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-text-width icon"></i>
                        <input type="text" name="hero_title" value="{{ old('hero_title', $aboutPage->hero_title) }}" class="field-input {{ $errors->has('hero_title') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('hero_title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('hero_title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Highlight</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-highlighter icon"></i>
                        <input type="text" name="hero_highlight" value="{{ old('hero_highlight', $aboutPage->hero_highlight) }}" class="field-input {{ $errors->has('hero_highlight') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('hero_highlight'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('hero_highlight') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description" rows="4" class="field-input {{ $errors->has('hero_description') ? 'error' : '' }}">{{ old('hero_description', $aboutPage->hero_description) }}</textarea>
                    @if($errors->has('hero_description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('hero_description') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Chips</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tags icon"></i>
                        <input type="text" name="hero_chips" value="{{ old('hero_chips', $aboutPage->hero_chips) }}" class="field-input">
                    </div>
                    <p class="field-hint">Comma separated. Example: Commercial & Industrial, Pharmaceutical, Food & Dairy</p>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Media & Stats</p>
                    <p class="form-card-subtitle">Image, stats and hero tags</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Current Hero Image</label>
                    <div style="width:180px;height:120px;border-radius:16px;overflow:hidden;border:1px solid #E2E8F0;background:#F8FAFC;">
                        <img src="{{ $aboutPage->hero_image_url }}" alt="Hero" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Replace Hero Image</label>
                    <input type="file" name="hero_image" accept="image/*" class="field-input {{ $errors->has('hero_image') ? 'error' : '' }}">
                    @if($errors->has('hero_image'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('hero_image') }}</p>
                    @else
                        <p class="field-hint">JPG, PNG, WEBP allowed.</p>
                    @endif
                </div>

                <div class="meta-grid-2">
                    <div class="field-group">
                        <label class="field-label">Stat 1 Value</label>
                        <input type="text" name="hero_stat_1_value" value="{{ old('hero_stat_1_value', $aboutPage->hero_stat_1_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Stat 1 Label</label>
                        <input type="text" name="hero_stat_1_label" value="{{ old('hero_stat_1_label', $aboutPage->hero_stat_1_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Stat 2 Value</label>
                        <input type="text" name="hero_stat_2_value" value="{{ old('hero_stat_2_value', $aboutPage->hero_stat_2_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Stat 2 Label</label>
                        <input type="text" name="hero_stat_2_label" value="{{ old('hero_stat_2_label', $aboutPage->hero_stat_2_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Stat 3 Value</label>
                        <input type="text" name="hero_stat_3_value" value="{{ old('hero_stat_3_value', $aboutPage->hero_stat_3_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Stat 3 Label</label>
                        <input type="text" name="hero_stat_3_label" value="{{ old('hero_stat_3_label', $aboutPage->hero_stat_3_label) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Footnote</label>
                    <textarea name="hero_footnote" rows="2" class="field-input">{{ old('hero_footnote', $aboutPage->hero_footnote) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Tag 1</label>
                    <input type="text" name="hero_tag_1" value="{{ old('hero_tag_1', $aboutPage->hero_tag_1) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Tag 2</label>
                    <input type="text" name="hero_tag_2" value="{{ old('hero_tag_2', $aboutPage->hero_tag_2) }}" class="field-input">
                </div>

            </div>
        </div>

    </div>

    <div class="form-card mt-3">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-stream"></i>
            </div>

            <div>
                <p class="form-card-title">Journey Section Intro</p>
                <p class="form-card-subtitle">Timeline section heading and intro text</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="meta-grid-2">
                <div class="field-group">
                    <label class="field-label">Journey Eyebrow</label>
                    <input type="text" name="journey_eyebrow" value="{{ old('journey_eyebrow', $aboutPage->journey_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Journey Title</label>
                    <input type="text" name="journey_title" value="{{ old('journey_title', $aboutPage->journey_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Journey Description 1</label>
                    <textarea name="journey_description_1" rows="3" class="field-input">{{ old('journey_description_1', $aboutPage->journey_description_1) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Journey Description 2</label>
                    <textarea name="journey_description_2" rows="3" class="field-input">{{ old('journey_description_2', $aboutPage->journey_description_2) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-form-grid mt-3">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission</p>
                    <p class="form-card-subtitle">Mission card content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Mission Eyebrow</label>
                    <input type="text" name="mission_eyebrow" value="{{ old('mission_eyebrow', $aboutPage->mission_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Mission Title</label>
                    <input type="text" name="mission_title" value="{{ old('mission_title', $aboutPage->mission_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Mission Description</label>
                    <textarea name="mission_description" rows="4" class="field-input">{{ old('mission_description', $aboutPage->mission_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Mission Points</label>
                    <textarea name="mission_points" rows="4" class="field-input">{{ old('mission_points', $aboutPage->mission_points) }}</textarea>
                    <p class="field-hint">Comma separated points.</p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-eye"></i>
                </div>

                <div>
                    <p class="form-card-title">Vision</p>
                    <p class="form-card-subtitle">Vision card content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Vision Eyebrow</label>
                    <input type="text" name="vision_eyebrow" value="{{ old('vision_eyebrow', $aboutPage->vision_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Title</label>
                    <input type="text" name="vision_title" value="{{ old('vision_title', $aboutPage->vision_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Description</label>
                    <textarea name="vision_description" rows="4" class="field-input">{{ old('vision_description', $aboutPage->vision_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Points</label>
                    <textarea name="vision_points" rows="4" class="field-input">{{ old('vision_points', $aboutPage->vision_points) }}</textarea>
                    <p class="field-hint">Comma separated points.</p>
                </div>
            </div>
        </div>

    </div>

    <div class="form-card mt-3">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-star"></i>
            </div>

            <div>
                <p class="form-card-title">Why Section & CTA</p>
                <p class="form-card-subtitle">Why Meraki content and bottom CTA</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="meta-grid-2">
                <div class="field-group">
                    <label class="field-label">Why Eyebrow</label>
                    <input type="text" name="why_eyebrow" value="{{ old('why_eyebrow', $aboutPage->why_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Why Title</label>
                    <input type="text" name="why_title" value="{{ old('why_title', $aboutPage->why_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Why Description</label>
                    <textarea name="why_description" rows="4" class="field-input">{{ old('why_description', $aboutPage->why_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Why Micro Points</label>
                    <textarea name="why_micro_points" rows="4" class="field-input">{{ old('why_micro_points', $aboutPage->why_micro_points) }}</textarea>
                    <p class="field-hint">Comma separated points.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Title</label>
                    <input type="text" name="cta_title" value="{{ old('cta_title', $aboutPage->cta_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Button Text</label>
                    <input type="text" name="cta_button_text" value="{{ old('cta_button_text', $aboutPage->cta_button_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Description</label>
                    <textarea name="cta_description" rows="3" class="field-input">{{ old('cta_description', $aboutPage->cta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Button Link</label>
                    <input type="text" name="cta_button_link" value="{{ old('cta_button_link', $aboutPage->cta_button_link) }}" class="field-input">
                </div>
            </div>

            <div class="form-info-box mt-3">
                <p class="meta-label">Status</p>

                <label class="role-checkbox-item {{ old('status', $aboutPage->status) ? 'checked' : '' }}" style="margin-top:10px;">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $aboutPage->status) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active About Page</span>
                </label>
            </div>
        </div>
    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                {{ trans('global.save') }}
            </button>

            <a href="{{ route('admin.about-pages.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </div>

</form>

@endsection