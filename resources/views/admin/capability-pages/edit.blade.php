@extends('layouts.admin')

@section('page-title', 'Edit Capability Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capability-pages.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Capability Page</h2>

        <p class="admin-page-subtitle">
            Update capability page content and images
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="fas fa-industry"></i>
        </div>

        <div>
            <p class="identity-title">Capability Page</p>
            <p class="identity-subtitle">ID #{{ $capabilityPage->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.capability-pages.update', $capabilityPage->id) }}" enctype="multipart/form-data">
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
                    <p class="form-card-subtitle">Main headline and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Hero Eyebrow</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="hero_eyebrow" value="{{ old('hero_eyebrow', $capabilityPage->hero_eyebrow) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-text-width icon"></i>
                        <input type="text" name="hero_title" value="{{ old('hero_title', $capabilityPage->hero_title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Highlight</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-highlighter icon"></i>
                        <input type="text" name="hero_highlight" value="{{ old('hero_highlight', $capabilityPage->hero_highlight) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description" rows="4" class="field-input">{{ old('hero_description', $capabilityPage->hero_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Chips</label>
                    <textarea name="hero_chips" rows="3" class="field-input">{{ old('hero_chips', $capabilityPage->hero_chips) }}</textarea>
                    <p class="field-hint">Comma separated. Example: HSL / Primers, 50–1200mm widths, Defect logs</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Visual Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="hero_visual_label" value="{{ old('hero_visual_label', $capabilityPage->hero_visual_label) }}" class="field-input">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero KPIs & Images</p>
                    <p class="form-card-subtitle">Stats and hero visuals</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="meta-grid-2">
                    <div class="field-group">
                        <label class="field-label">KPI 1 Value</label>
                        <input type="text" name="hero_kpi_1_value" value="{{ old('hero_kpi_1_value', $capabilityPage->hero_kpi_1_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 1 Label</label>
                        <input type="text" name="hero_kpi_1_label" value="{{ old('hero_kpi_1_label', $capabilityPage->hero_kpi_1_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 2 Value</label>
                        <input type="text" name="hero_kpi_2_value" value="{{ old('hero_kpi_2_value', $capabilityPage->hero_kpi_2_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 2 Label</label>
                        <input type="text" name="hero_kpi_2_label" value="{{ old('hero_kpi_2_label', $capabilityPage->hero_kpi_2_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 3 Value</label>
                        <input type="text" name="hero_kpi_3_value" value="{{ old('hero_kpi_3_value', $capabilityPage->hero_kpi_3_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 3 Label</label>
                        <input type="text" name="hero_kpi_3_label" value="{{ old('hero_kpi_3_label', $capabilityPage->hero_kpi_3_label) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Current Hero Image</label>
                    <div style="width:180px;height:110px;border-radius:16px;overflow:hidden;border:1px solid #E2E8F0;background:#F8FAFC;">
                        <img src="{{ $capabilityPage->hero_image_url }}" alt="Hero" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Replace Hero Image</label>
                    <input type="file" name="hero_image" accept="image/*" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Floating Image 1</label>
                    <input type="file" name="float_image_1" accept="image/*" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Floating Image 2</label>
                    <input type="file" name="float_image_2" accept="image/*" class="field-input">
                </div>

            </div>
        </div>

    </div>

    <div class="admin-form-grid mt-3">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-table"></i>
                </div>

                <div>
                    <p class="form-card-title">Specs Section</p>
                    <p class="form-card-subtitle">Specification table intro</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Specs Eyebrow</label>
                    <input type="text" name="specs_eyebrow" value="{{ old('specs_eyebrow', $capabilityPage->specs_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Specs Title</label>
                    <input type="text" name="specs_title" value="{{ old('specs_title', $capabilityPage->specs_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Specs Description</label>
                    <textarea name="specs_description" rows="4" class="field-input">{{ old('specs_description', $capabilityPage->specs_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Specs Button Text</label>
                    <input type="text" name="specs_button_text" value="{{ old('specs_button_text', $capabilityPage->specs_button_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Specs Button Link</label>
                    <input type="text" name="specs_button_link" value="{{ old('specs_button_link', $capabilityPage->specs_button_link) }}" class="field-input">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>

                <div>
                    <p class="form-card-title">Process Section</p>
                    <p class="form-card-subtitle">Workflow intro</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Process Eyebrow</label>
                    <input type="text" name="process_eyebrow" value="{{ old('process_eyebrow', $capabilityPage->process_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Process Title</label>
                    <input type="text" name="process_title" value="{{ old('process_title', $capabilityPage->process_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Process Description</label>
                    <textarea name="process_description" rows="4" class="field-input">{{ old('process_description', $capabilityPage->process_description) }}</textarea>
                </div>
            </div>
        </div>

    </div>

    <div class="form-card mt-3">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-bullhorn"></i>
            </div>

            <div>
                <p class="form-card-title">CTA Section</p>
                <p class="form-card-subtitle">RFQ section content</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="meta-grid-2">
                <div class="field-group">
                    <label class="field-label">CTA Eyebrow</label>
                    <input type="text" name="cta_eyebrow" value="{{ old('cta_eyebrow', $capabilityPage->cta_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Title</label>
                    <input type="text" name="cta_title" value="{{ old('cta_title', $capabilityPage->cta_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Description</label>
                    <textarea name="cta_description" rows="4" class="field-input">{{ old('cta_description', $capabilityPage->cta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Points</label>
                    <textarea name="cta_points" rows="4" class="field-input">{{ old('cta_points', $capabilityPage->cta_points) }}</textarea>
                    <p class="field-hint">Comma separated points.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Trust Chips</label>
                    <textarea name="cta_trust_chips" rows="4" class="field-input">{{ old('cta_trust_chips', $capabilityPage->cta_trust_chips) }}</textarea>
                    <p class="field-hint">Comma separated chips.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Button Text</label>
                    <input type="text" name="cta_button_text" value="{{ old('cta_button_text', $capabilityPage->cta_button_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Button Link</label>
                    <input type="text" name="cta_button_link" value="{{ old('cta_button_link', $capabilityPage->cta_button_link) }}" class="field-input">
                </div>
            </div>

            <div class="form-info-box mt-3">
                <p class="meta-label">Status</p>

                <label class="role-checkbox-item {{ old('status', $capabilityPage->status) ? 'checked' : '' }}" style="margin-top:10px;">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $capabilityPage->status) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active Capability Page</span>
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

            <a href="{{ route('admin.capability-pages.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </div>

</form>

@endsection