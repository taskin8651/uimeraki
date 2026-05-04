@extends('layouts.admin')

@section('page-title', 'Add Capability Specification')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capability-specs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Specification</h2>

        <p class="admin-page-subtitle">
            Create a new capability specification row
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.capability-specs.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-table"></i>
                </div>

                <div>
                    <p class="form-card-title">Specification Information</p>
                    <p class="form-card-subtitle">Process, details and notes</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="process">
                        Process <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-cog icon"></i>
                        <input type="text"
                               name="process"
                               id="process"
                               value="{{ old('process') }}"
                               required
                               placeholder="Example: Rotogravure"
                               class="field-input {{ $errors->has('process') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('process'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('process') }}
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
                               placeholder="Example: bi bi-printer or fas fa-print"
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
                    <label class="field-label" for="range_detail">Range / Detail</label>

                    <textarea name="range_detail"
                              id="range_detail"
                              rows="4"
                              placeholder="Example: Up to 6 colors; tight register"
                              class="field-input {{ $errors->has('range_detail') ? 'error' : '' }}">{{ old('range_detail') }}</textarea>

                    @if($errors->has('range_detail'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('range_detail') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="notes">Notes</label>

                    <textarea name="notes"
                              id="notes"
                              rows="4"
                              placeholder="Example: Solvent / water-based inks"
                              class="field-input {{ $errors->has('notes') ? 'error' : '' }}">{{ old('notes') }}</textarea>

                    @if($errors->has('notes'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('notes') }}
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
                        <span class="checkbox-text">Active Specification</span>
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

        <a href="{{ route('admin.capability-specs.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection