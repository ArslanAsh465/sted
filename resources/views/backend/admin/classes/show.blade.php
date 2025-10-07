@extends('backend.admin.layout.app')

@section('title', 'Class Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.classes.index') }}" class="text-decoration-none">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Class Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Class Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Class Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Class Name:</div>
            <div class="col-md-9">{{ $class->name }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Status:</div>
            <div class="col-md-9">
                <span class="badge {{ $class->status ? 'bg-success' : 'bg-secondary' }}">
                    {{ $class->status ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Description:</div>
            <div class="col-md-9">{!! nl2br(e($class->description)) !!}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Created At:</div>
            <div class="col-md-9">{{ $class->created_at->format('M d, Y') }}</div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold">Last Updated:</div>
            <div class="col-md-9">{{ $class->updated_at->format('M d, Y') }}</div>
        </div>
    </div>
@endsection
