@extends('layouts.admin')

@section('page-title', 'Edit FAQ')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit FAQ</h2>

        <p class="admin-page-subtitle">
            Update question and answer details
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar" style="background:#0EA5E9;">
            <i class="fas fa-question"></i>
        </div>

        <div>
            <p class="identity-title">FAQ #{{ $faq->id }}</p>
            <p class="identity-subtitle">
                {{ $faq->status ? 'Active' : 'Inactive' }}
            </p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
    @method('PUT')
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
                               value="{{ old('question', $faq->question) }}"
                               required
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
                              class="field-input {{ $errors->has('answer') ? 'error' : '' }}">{{ old('answer', $faq->answer) }}</textarea>

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
                               value="{{ old('sort_order', $faq->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $faq->status) ? 'checked' : '' }}"
                           style="margin-top:10px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $faq->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Active
                        </span>
                    </label>

                    <p class="field-hint mt-2">
                        Active FAQ frontend par show hoga.
                    </p>
                </div>

                <div class="form-info-box mt-3">
                    <p class="meta-label">FAQ Info</p>

                    <div class="meta-grid-2">
                        <div>
                            <p class="meta-small-label">Created</p>
                            <p class="meta-value-strong">
                                {{ optional($faq->created_at)->format('d M Y') ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="meta-small-label">Updated</p>
                            <p class="meta-value-strong">
                                {{ optional($faq->updated_at)->format('d M Y') ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                Save FAQ
            </button>

            <a href="{{ route('admin.faqs.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('faq_delete')
            <button type="submit"
                    form="delete-faq-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete FAQ
            </button>
        @endcan
    </div>

</form>

@can('faq_delete')
    <form id="delete-faq-form"
          action="{{ route('admin.faqs.destroy', $faq->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection