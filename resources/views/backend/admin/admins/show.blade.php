@extends('backend.admin.layout.app')

@section('title', 'Admin Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}" class="text-decoration-none">Admins</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Details</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Admin Details</h1>
            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary btn-sm">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>
        </div>
    </div>

    <!-- Admin Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Username:</div>
            <div class="col-md-9">{{ $admin->username }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email:</div>
            <div class="col-md-9">{{ $admin->email }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email Verified:</div>
            <div class="col-md-9">
                @if($admin->email_verified_at)
                    {{ $admin->email_verified_at->diffForHumans() }}
                    <span class="badge bg-success ms-2">Verified</span>
                @else
                    <span class="text-danger">Not Verified</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Is Verified:</div>
            <div class="col-md-9">
                @if($admin->is_verified)
                    <span class="badge bg-success">Yes</span>
                @else
                    <span class="badge bg-danger">No</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Registered On:</div>
            <div class="col-md-9">{{ $admin->created_at->diffForHumans() }}</div>
        </div>
    </div>
@endsection
