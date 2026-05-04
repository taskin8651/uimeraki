@extends('layouts.admin')

@section('page-title', 'Edit Capability Specification')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.capability-specs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Specification</h2>

        <p class="admin-page-subtitle">
            Update capability specification row
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0494E6;">
            <i class="{{ $capabilitySpec->icon ?: 'fas fa-table' }}"></i>
        </div>

        <div>
            <p class="identity-title">{{ $capabilitySpec->process }}</p>
            <p class="identity-subtitle">ID #{{ $capabilitySpec->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.capability-specs.update', $capabilitySpec->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <p class="form-card-title">Specification Information</p>
                    <p class="form-card-subtitle">Update process, details and notes</p>
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
                               value="{{ old('process', $capabilitySpec->process) }}"
                               required
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
                               value="{{ old('icon', $capabilitySpec->icon) }}"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="range_detail">Range / Detail</label>

                    <textarea name="range_detail"
                              id="range_detail"
                              rows="4"
                              class="field-input {{ $errors->has('range_detail') ? 'error' : '' }}">{{ old('range_detail', $capabilitySpec->range_detail) }}</textarea>

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
                              class="field-input {{ $errors->has('notes') ? 'error' : '' }}">{{ old('notes', $capabilitySpec->notes) }}</textarea>

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
                    <p class="form-card-subtitle">Update visibility and ordering</p>
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
                               value="{{ old('sort_order', $capabilitySpec->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $capabilitySpec->status) ? 'checked' : '' }}" style="margin-top:10px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $capabilitySpec->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active Specification</span>
                    </label>
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

            <a href="{{ route('admin.capability-specs.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('capability_spec_delete')
            <button type="submit" form="delete-spec-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Specification
            </button>
        @endcan
    </div>
</form>

@can('capability_spec_delete')
    <form id="delete-spec-form"
          action="{{ route('admin.capability-specs.destroy', $capabilitySpec->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @csrf
        @method('DELETE')
    </form>
@endcan

@endsection