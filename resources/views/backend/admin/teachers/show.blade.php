@extends('backend.admin.layout.app')

@section('title', 'Teacher Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.teachers.index') }}" class="text-decoration-none">Teachers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Teacher Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Teacher Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Teacher Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        {{-- User Account Info --}}
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Username:</div>
            <div class="col-md-9">{{ $teacher->username }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email:</div>
            <div class="col-md-9">{{ $teacher->email }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email Verified:</div>
            <div class="col-md-9">
                @if($teacher->email_verified_at)
                    {{ $teacher->email_verified_at->diffForHumans() }}
                    <span class="badge bg-success ms-2">Verified</span>
                @else
                    <span class="text-danger">Not Verified</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Registered On:</div>
            <div class="col-md-9">{{ $teacher->created_at->diffForHumans() }}</div>
        </div>

        {{-- Teacher Profile Info --}}
        @if($teacher->teacher)
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Institute:</div>
                <div class="col-md-9">{{ $teacher->teacher->institute->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">First Name:</div>
                <div class="col-md-9">{{ $teacher->teacher->first_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Last Name:</div>
                <div class="col-md-9">{{ $teacher->teacher->last_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Phone:</div>
                <div class="col-md-9">{{ $teacher->teacher->phone }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Qualification:</div>
                <div class="col-md-9">{{ $teacher->teacher->qualification }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Specialization:</div>
                <div class="col-md-9">{{ $teacher->teacher->specialization }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Address:</div>
                <div class="col-md-9">{{ $teacher->teacher->address }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Postal Code:</div>
                <div class="col-md-9">{{ $teacher->teacher->postal_code }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Country:</div>
                <div class="col-md-9">{{ $teacher->teacher->country->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">State:</div>
                <div class="col-md-9">{{ $teacher->teacher->state->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">City:</div>
                <div class="col-md-9">{{ $teacher->teacher->city->name ?? '-' }}</div>
            </div>
        @endif
    </div>
@endsection
