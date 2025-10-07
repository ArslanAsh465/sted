@extends('backend.admin.layout.app')

@section('title', 'Exam Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.exams.index') }}" class="text-decoration-none">Exams</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exam Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Exam Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Exam Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Exam Name:</div>
            <div class="col-md-9">{{ $exam->name }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Category:</div>
            <div class="col-md-9">{{ $exam->category->name ?? 'N/A' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Class:</div>
            <div class="col-md-9">{{ $exam->class->name ?? 'N/A' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Created By:</div>
            <div class="col-md-9">{{ $exam->user->username ?? 'N/A' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Fee:</div>
            <div class="col-md-9">Rs. {{ number_format($exam->fee, 2) }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Status:</div>
            <div class="col-md-9">
                <span class="badge {{ $exam->status ? 'bg-success' : 'bg-secondary' }}">
                    {{ $exam->status ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Date:</div>
            <div class="col-md-9">{{ \Carbon\Carbon::parse($exam->date)->format('M d, Y') }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Centers:</div>
            <div class="col-md-9">
                @if($exam->centers->isNotEmpty())
                    @foreach($exam->centers as $center)
                        <span class="badge bg-info text-dark me-1 mb-1">{{ $center->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted fst-italic">No centers assigned.</span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold">Description:</div>
            <div class="col-md-9">{!! $exam->description !!}</div>
        </div>
    </div>
@endsection
