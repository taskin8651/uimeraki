@extends('layouts.admin')

@section('page-title', 'Add FAQ')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add FAQ</h2>

        <p class="admin-page-subtitle">
            Add question and answer for frontend FAQ section
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.faqs.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-question-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">FAQ Details</p>
                    <p class="form-card-subtitle">Question and answer content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="question">
                        Question <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-question icon"></i>

                        <input type="text"
                               name="question"
                               id="question"
                               value="{{ old('question') }}"
                               required
                               placeholder="Enter question"
                               class="field-input {{ $errors->has('question') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('question'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="answer">
                        Answer
                    </label>

                    <textarea name="answer"
                              id="answer"
                              rows="8"
                              placeholder="Enter answer"
                              class="field-input {{ $errors->has('answer') ? 'error' : '' }}">{{ old('answer') }}</textarea>

                    @if($errors->has('answer'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('answer') }}
                        </p>
                    @else
                        <p class="field-hint">
                            HTML allowed. Example: &lt;p&gt;Answer text&lt;/p&gt;
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
                    <p class="form-card-title">FAQ Settings</p>
                    <p class="form-card-subtitle">Sort order and visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
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
                    <p class="meta-label">Visibility</p>

                    <label class="role-checkbox-item {{ old('status', 1) ? 'checked' : '' }}"
                           style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', 1) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Active
                        </span>
                    </label>

                    <p class="field-hint mt-2">
                        Active FAQ frontend par show hoga.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save FAQ
        </button>

        <a href="{{ route('admin.faqs.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection