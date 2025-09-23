@extends('backend.admin.layout.app')

@section('title', 'Student Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.students.index') }}" class="text-decoration-none">Students</a></li>
                <li class="breadcrumb-item active" aria-current="page">Student Details</li>
            </ol>
        </nav>

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Student Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Student Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        {{-- User Account Info --}}
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Username:</div>
            <div class="col-md-9">{{ $student->username }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email:</div>
            <div class="col-md-9">{{ $student->email }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email Verified:</div>
            <div class="col-md-9">
                @if($student->email_verified_at)
                    {{ $student->email_verified_at->diffForHumans() }}
                    <span class="badge bg-success ms-2">Verified</span>
                @else
                    <span class="text-danger">Not Verified</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Registered On:</div>
            <div class="col-md-9">{{ $student->created_at->diffForHumans() }}</div>
        </div>

        {{-- Student Profile Info --}}
        @if($student->student)
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Parent:</div>
                <div class="col-md-9">
                    {{ $student->student->parent->first_name }} {{ $student->student->parent->last_name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">First Name:</div>
                <div class="col-md-9">{{ $student->student->first_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Last Name:</div>
                <div class="col-md-9">{{ $student->student->last_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Roll Number:</div>
                <div class="col-md-9">{{ $student->student->roll_no }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Date of Birth:</div>
                <div class="col-md-9">{{ $student->student->date_of_birth }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Address:</div>
                <div class="col-md-9">{{ $student->student->address }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Postal Code:</div>
                <div class="col-md-9">{{ $student->student->postal_code }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Country:</div>
                <div class="col-md-9">{{ $student->student->country->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">State:</div>
                <div class="col-md-9">{{ $student->student->state->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">City:</div>
                <div class="col-md-9">{{ $student->student->city->name ?? '-' }}</div>
            </div>
        @endif
    </div>
@endsection
