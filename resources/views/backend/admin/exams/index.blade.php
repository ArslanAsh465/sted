@extends('backend.admin.layout.app')

@section('title', 'Exams')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exams</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Exams</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.exams.create') }}" class="btn btn-sm btn-primary" title="Add New Exam">
                    <i class="bi bi-plus-circle me-1"></i> Add
                </a>
            </div>
        </div>
    </div>

    <!-- Exams Table -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-lg-table-cell">Category</th>
                        <th class="d-none d-lg-table-cell">Class</th>
                        <th>Fee</th>
                        <th>Status</th>
                        <th class="d-none d-lg-table-cell">Date</th>
                        <th class="d-none d-lg-table-cell">Centers</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($exams as $exam)
                        <tr>
                            <td>{{ $exam->name }}</td>
                            <td class="d-none d-lg-table-cell">{{ $exam->category->name ?? '-' }}</td>
                            <td class="d-none d-lg-table-cell">{{ $exam->class->name ?? '-' }}</td>
                            <td>Rs. {{ number_format($exam->fee) }}</td>
                            <td>
                                <span class="badge {{ $exam->status ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $exam->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="d-none d-lg-table-cell">{{ \Carbon\Carbon::parse($exam->date)->format('M d, Y') }}</td>
                            <td class="d-none d-lg-table-cell">{{ $exam->centers->count() }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <a href="{{ route('admin.exams.show', $exam->id) }}" class="text-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.exams.edit', $exam->id) }}" class="text-primary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST" class="delete-exam-form" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn p-0 border-0 bg-transparent text-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No exams found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection

@section('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-exam-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This exam will be deleted permanently.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
