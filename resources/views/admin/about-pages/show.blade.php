@extends('layouts.admin')

@section('page-title', 'Show About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-pages.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">About Page Details</h2>
        <p class="admin-page-subtitle">Full about page content preview</p>
    </div>

    <div class="show-actions">
        @can('about_page_edit')
            <a href="{{ route('admin.about-pages.edit', $aboutPage->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        @endcan
    </div>
</div>

@include('admin.about-pages.index')

@endsection