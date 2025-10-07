@extends('backend.admin.layout.app')

@section('title', 'Exam Category Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.exam.categories.index') }}" class="text-decoration-none">Exam Categories</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Exam Category Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Exam Category Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.exam.categories.edit', $exam_category->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Exam Category Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <!-- Name -->
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Category Name:</div>
            <div class="col-md-9">{{ $exam_category->name }}</div>
        </div>

        <!-- Status -->
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Status:</div>
            <div class="col-md-9">
                <span class="badge {{ $exam_category->status ? 'bg-success' : 'bg-secondary' }}">
                    {{ $exam_category->status ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <!-- Description -->
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Description:</div>
            <div class="col-md-9">{!! nl2br(e($exam_category->description)) !!}</div>
        </div>

        <!-- Created At -->
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Created At:</div>
            <div class="col-md-9">{{ $exam_category->created_at->format('M d, Y') }}</div>
        </div>

        <!-- Updated At -->
        <div class="row">
            <div class="col-md-3 fw-semibold">Last Updated:</div>
            <div class="col-md-9">{{ $exam_category->updated_at->format('M d, Y') }}</div>
        </div>
    </div>
@endsection
