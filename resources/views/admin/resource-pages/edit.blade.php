@extends('layouts.admin')

@section('page-title', 'Edit Resource Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.resource-pages.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Resource Page</h2>
        <p class="admin-page-subtitle">
            Update resource page hero, search, stats and featured resource
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="fas fa-book-open"></i>
        </div>

        <div>
            <p class="identity-title">Resource Page</p>
            <p class="identity-subtitle">ID #{{ $resourcePage->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.resource-pages.update', $resourcePage->id) }}">
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
                    <p class="form-card-subtitle">Main resource page content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Hero Eyebrow</label>
                    <input type="text"
                           name="hero_eyebrow"
                           value="{{ old('hero_eyebrow', $resourcePage->hero_eyebrow) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Title</label>
                    <textarea name="hero_title" rows="3" class="field-input">{{ old('hero_title', $resourcePage->hero_title) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description" rows="4" class="field-input">{{ old('hero_description', $resourcePage->hero_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Search Placeholder</label>
                    <input type="text"
                           name="search_placeholder"
                           value="{{ old('search_placeholder', $resourcePage->search_placeholder) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Quick Tags</label>
                    <textarea name="quick_tags" rows="3" class="field-input">{{ old('quick_tags', $resourcePage->quick_tags) }}</textarea>
                    <p class="field-hint">Comma separated. Example: Blister vs strip, Sealing issues, Food & Dairy</p>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <p class="form-card-title">Meta Stats</p>
                    <p class="form-card-subtitle">Hero small stats</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="meta-grid-2">
                    <div class="field-group">
                        <label class="field-label">Meta 1 Value</label>
                        <input type="text" name="meta_1_value" value="{{ old('meta_1_value', $resourcePage->meta_1_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Meta 1 Label</label>
                        <input type="text" name="meta_1_label" value="{{ old('meta_1_label', $resourcePage->meta_1_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Meta 2 Value</label>
                        <input type="text" name="meta_2_value" value="{{ old('meta_2_value', $resourcePage->meta_2_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Meta 2 Label</label>
                        <input type="text" name="meta_2_label" value="{{ old('meta_2_label', $resourcePage->meta_2_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Meta 3 Value</label>
                        <input type="text" name="meta_3_value" value="{{ old('meta_3_value', $resourcePage->meta_3_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">Meta 3 Label</label>
                        <input type="text" name="meta_3_label" value="{{ old('meta_3_label', $resourcePage->meta_3_label) }}" class="field-input">
                    </div>
                </div>

                <div class="form-info-box mt-3">
                    <p class="meta-label">Status</p>

                    <label class="role-checkbox-item {{ old('status', $resourcePage->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $resourcePage->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Resource Page</span>
                    </label>
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
                <p class="form-card-title">Featured Resource</p>
                <p class="form-card-subtitle">Choose resource for hero featured card</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">
                <div class="field-group">
                    <label class="field-label">Featured Label</label>
                    <input type="text"
                           name="featured_label"
                           value="{{ old('featured_label', $resourcePage->featured_label) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Featured Resource</label>

                    <select name="featured_resource_id" class="field-input">
                        <option value="">Auto select featured resource</option>
                        @foreach($resources as $id => $title)
                            <option value="{{ $id }}" {{ old('featured_resource_id', $resourcePage->featured_resource_id) == $id ? 'selected' : '' }}>
                                {{ $title }}
                            </option>
                        @endforeach
                    </select>

                    <p class="field-hint">
                        Agar blank chhodoge to frontend me first active featured resource show hoga.
                    </p>
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

            <a href="{{ route('admin.resource-pages.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </div>

</form>

@endsection