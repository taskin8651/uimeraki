@extends('layouts.admin')

@section('page-title', 'Add Capability Process Step')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capability-processes.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Process Step</h2>

        <p class="admin-page-subtitle">
            Create a new workflow step for capability page
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.capability-processes.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>

                <div>
                    <p class="form-card-title">Process Information</p>
                    <p class="form-card-subtitle">Icon, title and description</p>
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
                               value="{{ old('title') }}"
                               required
                               placeholder="Example: Consultation"
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
                    <label class="field-label" for="icon">Icon Class</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="icon"
                               id="icon"
                               value="{{ old('icon') }}"
                               placeholder="Example: bi bi-chat-dots or fas fa-comments"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon') }}
                        </p>
                    @else
                        <p class="field-hint">Use Bootstrap Icons or FontAwesome class.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Process step description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
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
                    <p class="form-card-subtitle">Visibility and ordering</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
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

                    <label class="role-checkbox-item checked" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" checked>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Process Step</span>
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

        <a href="{{ route('admin.capability-processes.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection