@extends('backend.admin.layout.app')

@section('title', 'Center Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.centers.index') }}" class="text-decoration-none">Centers</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Center Details</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Center Details</h1>
            <a href="{{ route('admin.centers.edit', $center->id) }}" class="btn btn-primary btn-sm">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>
        </div>
    </div>

    <!-- Center Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Name:</div>
            <div class="col-md-9">{{ $center->name }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Status:</div>
            <div class="col-md-9">
                @if ($center->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Address:</div>
            <div class="col-md-9">{{ $center->address }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">City:</div>
            <div class="col-md-9">{{ $center->city->name ?? 'N/A' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">State:</div>
            <div class="col-md-9">{{ $center->state->name ?? 'N/A' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Country:</div>
            <div class="col-md-9">{{ $center->country->name ?? 'N/A' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Postal Code:</div>
            <div class="col-md-9">{{ $center->postal_code }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Created At:</div>
            <div class="col-md-9">{{ $center->created_at->diffForHumans() }}</div>
        </div>
    </div>
@endsection
