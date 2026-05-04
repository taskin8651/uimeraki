@extends('layouts.admin')

@section('page-title', 'Add QA Snapshot')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-snapshots.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add QA Snapshot</h2>
        <p class="admin-page-subtitle">Create a new QA snapshot block</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.quality-snapshots.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div>
                    <p class="form-card-title">Snapshot Information</p>
                    <p class="form-card-subtitle">Title and description</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="5" class="field-input">{{ old('description') }}</textarea>
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
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="field-input">
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Status</p>
                    <label class="role-checkbox-item checked" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" checked>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Snapshot</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i> {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.quality-snapshots.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection