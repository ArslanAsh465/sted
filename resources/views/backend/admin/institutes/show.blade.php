@extends('backend.admin.layout.app')

@section('title', 'Institute Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.institutes.index') }}" class="text-decoration-none">Institutes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Institute Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Institute Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.institutes.edit', $institute->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Institute Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Username:</div>
            <div class="col-md-9">{{ $institute->username }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email:</div>
            <div class="col-md-9">{{ $institute->email }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Email Verified:</div>
            <div class="col-md-9">
                @if($institute->email_verified_at)
                    {{ $institute->email_verified_at->diffForHumans() }}
                    <span class="badge bg-success ms-2">Verified</span>
                @else
                    <span class="text-danger">Not Verified</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Is Verified:</div>
            <div class="col-md-9">
                @if($institute->is_verified)
                    <span class="badge bg-success">Yes</span>
                @else
                    <span class="badge bg-danger">No</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Registered On:</div>
            <div class="col-md-9">{{ $institute->created_at->diffForHumans() }}</div>
        </div>

        {{-- Institute Specific Details --}}
        @if($institute->institute)
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Institute Name:</div>
                <div class="col-md-9">{{ $institute->institute->name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Principal Name:</div>
                <div class="col-md-9">{{ $institute->institute->principal_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Mobile Number:</div>
                <div class="col-md-9">{{ $institute->institute->mobile_no }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">WhatsApp Number:</div>
                <div class="col-md-9">{{ $institute->institute->whatsapp_no ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Website:</div>
                <div class="col-md-9">{{ $institute->institute->website ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Registration Number:</div>
                <div class="col-md-9">{{ $institute->institute->registration_number ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Postal Code:</div>
                <div class="col-md-9">{{ $institute->institute->postal_code }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Address:</div>
                <div class="col-md-9">{{ $institute->institute->address }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Country:</div>
                <div class="col-md-9">{{ $institute->institute->country->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">State:</div>
                <div class="col-md-9">{{ $institute->institute->state->name ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">City:</div>
                <div class="col-md-9">{{ $institute->institute->city->name ?? '-' }}</div>
            </div>
        @endif
    </div>
@endsection
