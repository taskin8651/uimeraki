@extends('layouts.admin')

@section('page-title', 'Edit Quality Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-pages.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Quality Page</h2>

        <p class="admin-page-subtitle">
            Update quality page content
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="fas fa-award"></i>
        </div>

        <div>
            <p class="identity-title">Quality Page</p>
            <p class="identity-subtitle">ID #{{ $qualityPage->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.quality-pages.update', $qualityPage->id) }}">
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
                    <p class="form-card-subtitle">Main quality page content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Hero Eyebrow</label>
                    <input type="text" name="hero_eyebrow" value="{{ old('hero_eyebrow', $qualityPage->hero_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $qualityPage->hero_title) }}" class="field-input">
                    <p class="field-hint">Example: Controlled processes.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Highlight</label>
                    <input type="text" name="hero_highlight" value="{{ old('hero_highlight', $qualityPage->hero_highlight) }}" class="field-input">
                    <p class="field-hint">Example: results.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description" rows="4" class="field-input">{{ old('hero_description', $qualityPage->hero_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Chips</label>
                    <textarea name="hero_chips" rows="3" class="field-input">{{ old('hero_chips', $qualityPage->hero_chips) }}</textarea>
                    <p class="field-hint">Comma separated. Example: Batch traceability, In-process QA</p>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Metrics</p>
                    <p class="form-card-subtitle">KPI values and labels</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="meta-grid-2">
                    <div class="field-group">
                        <label class="field-label">KPI 1 Value</label>
                        <input type="text" name="hero_kpi_1_value" value="{{ old('hero_kpi_1_value', $qualityPage->hero_kpi_1_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 1 Label</label>
                        <input type="text" name="hero_kpi_1_label" value="{{ old('hero_kpi_1_label', $qualityPage->hero_kpi_1_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 2 Value</label>
                        <input type="text" name="hero_kpi_2_value" value="{{ old('hero_kpi_2_value', $qualityPage->hero_kpi_2_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 2 Label</label>
                        <input type="text" name="hero_kpi_2_label" value="{{ old('hero_kpi_2_label', $qualityPage->hero_kpi_2_label) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 3 Value</label>
                        <input type="text" name="hero_kpi_3_value" value="{{ old('hero_kpi_3_value', $qualityPage->hero_kpi_3_value) }}" class="field-input">
                    </div>

                    <div class="field-group">
                        <label class="field-label">KPI 3 Label</label>
                        <input type="text" name="hero_kpi_3_label" value="{{ old('hero_kpi_3_label', $qualityPage->hero_kpi_3_label) }}" class="field-input">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="admin-form-grid mt-3">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>

                <div>
                    <p class="form-card-title">QA Snapshot</p>
                    <p class="form-card-subtitle">Hero right card labels</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Snapshot Label</label>
                    <input type="text" name="snapshot_label" value="{{ old('snapshot_label', $qualityPage->snapshot_label) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Snapshot Badge</label>
                    <input type="text" name="snapshot_badge" value="{{ old('snapshot_badge', $qualityPage->snapshot_badge) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Floating Badge Icon</label>
                    <input type="text" name="floating_badge_icon" value="{{ old('floating_badge_icon', $qualityPage->floating_badge_icon) }}" class="field-input">
                    <p class="field-hint">Example: bi bi-shield-lock</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Floating Badge Title</label>
                    <input type="text" name="floating_badge_title" value="{{ old('floating_badge_title', $qualityPage->floating_badge_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Floating Badge Text</label>
                    <input type="text" name="floating_badge_text" value="{{ old('floating_badge_text', $qualityPage->floating_badge_text) }}" class="field-input">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Quality Pillars Section</p>
                    <p class="form-card-subtitle">Heading content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Pillar Eyebrow</label>
                    <input type="text" name="pillar_eyebrow" value="{{ old('pillar_eyebrow', $qualityPage->pillar_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Pillar Title</label>
                    <input type="text" name="pillar_title" value="{{ old('pillar_title', $qualityPage->pillar_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Pillar Description</label>
                    <textarea name="pillar_description" rows="4" class="field-input">{{ old('pillar_description', $qualityPage->pillar_description) }}</textarea>
                </div>
            </div>
        </div>

    </div>

    <div class="form-card mt-3">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-project-diagram"></i>
            </div>

            <div>
                <p class="form-card-title">QA Process Section</p>
                <p class="form-card-subtitle">Timeline heading content</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="meta-grid-2">
                <div class="field-group">
                    <label class="field-label">Process Eyebrow</label>
                    <input type="text" name="process_eyebrow" value="{{ old('process_eyebrow', $qualityPage->process_eyebrow) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Process Title</label>
                    <input type="text" name="process_title" value="{{ old('process_title', $qualityPage->process_title) }}" class="field-input">
                </div>

                <div class="field-group" style="grid-column: span 2;">
                    <label class="field-label">Process Description</label>
                    <textarea name="process_description" rows="4" class="field-input">{{ old('process_description', $qualityPage->process_description) }}</textarea>
                </div>

                <div class="field-group" style="grid-column: span 2;">
                    <label class="field-label">Process Note</label>
                    <input type="text" name="process_note" value="{{ old('process_note', $qualityPage->process_note) }}" class="field-input">
                </div>
            </div>

            <div class="form-info-box mt-3">
                <p class="meta-label">Status</p>

                <label class="role-checkbox-item {{ old('status', $qualityPage->status) ? 'checked' : '' }}" style="margin-top:10px;">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $qualityPage->status) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active Quality Page</span>
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

            <a href="{{ route('admin.quality-pages.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </div>

</form>

@endsection