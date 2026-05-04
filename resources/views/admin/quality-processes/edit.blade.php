@extends('layouts.admin')

@section('page-title', 'Edit Quality Process Step')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-processes.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Process Step</h2>
        <p class="admin-page-subtitle">Update QA timeline step</p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $qualityProcess->icon ?: 'fas fa-project-diagram' }}"></i>
        </div>
        <div>
            <p class="identity-title">{{ $qualityProcess->title }}</p>
            <p class="identity-subtitle">ID #{{ $qualityProcess->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.quality-processes.update', $qualityProcess->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <p class="form-card-title">Process Information</p>
                    <p class="form-card-subtitle">Update icon, title and content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" value="{{ old('icon', $qualityProcess->icon) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $qualityProcess->title) }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="5" class="field-input">{{ old('description', $qualityProcess->description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Points</label>
                    <textarea name="points" rows="4" class="field-input">{{ old('points', $qualityProcess->points) }}</textarea>
                    <p class="field-hint">Comma separated points.</p>
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
                    <p class="form-card-subtitle">Sort and status</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $qualityProcess->sort_order) }}" min="0" class="field-input">
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>
                    <label class="role-checkbox-item {{ old('status', $qualityProcess->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $qualityProcess->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Process Step</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> {{ trans('global.save') }}
            </button>

            <a href="{{ route('admin.quality-processes.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('quality_process_delete')
            <button type="submit" form="delete-quality-process-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i> Delete Step
            </button>
        @endcan
    </div>
</form>

@can('quality_process_delete')
    <form id="delete-quality-process-form"
          action="{{ route('admin.quality-processes.destroy', $qualityProcess->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @csrf
        @method('DELETE')
    </form>
@endcan

@endsection