@extends('backend.admin.layout.app')

@section('title', 'Parent Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.parents.index') }}" class="text-decoration-none">Parents</a></li>
                <li class="breadcrumb-item active" aria-current="page">Parent Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Parent Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.parents.edit', $parent->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Parent Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        {{-- User Account Info --}}
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Username:</div>
            <div class="col-md-9">{{ $parent->username }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email:</div>
            <div class="col-md-9">{{ $parent->email }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email Verified:</div>
            <div class="col-md-9">
                @if($parent->email_verified_at)
                    {{ $parent->email_verified_at->diffForHumans() }}
                    <span class="badge bg-success ms-2">Verified</span>
                @else
                    <span class="text-danger">Not Verified</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Registered On:</div>
            <div class="col-md-9">{{ $parent->created_at->diffForHumans() }}</div>
        </div>

        {{-- Parent Profile Info --}}
        @if($parent->parent)
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">First Name:</div>
                <div class="col-md-9">{{ $parent->parent->first_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Last Name:</div>
                <div class="col-md-9">{{ $parent->parent->last_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Phone:</div>
                <div class="col-md-9">{{ $parent->parent->phone }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Address:</div>
                <div class="col-md-9">{{ $parent->parent->address }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Postal Code:</div>
                <div class="col-md-9">{{ $parent->parent->postal_code }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Country:</div>
                <div class="col-md-9">{{ $parent->parent->country->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">State:</div>
                <div class="col-md-9">{{ $parent->parent->state->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">City:</div>
                <div class="col-md-9">{{ $parent->parent->city->name ?? '-' }}</div>
            </div>
        @endif
    </div>
@endsection
