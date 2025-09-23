@extends('backend.admin.layout.app')

@section('title', 'Teachers')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Teachers</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.teachers.create') }}" class="btn btn-sm btn-primary" title="Add New Teacher">
                    <i class="bi bi-plus-circle me-1"></i> Add
                </a>
            </div>
        </div>
    </div>

    <!-- Teachers Table -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        @if($teachers->isEmpty())
            <p>No teachers found.</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STID</th>
                            <th>First Name</th>
                            <th class="d-none d-lg-table-cell">Last Name</th>
                            <th class="d-none d-lg-table-cell">Email</th>
                            <th class="d-none d-lg-table-cell">Phone</th>
                            <th class="d-none d-lg-table-cell">Qualification</th>
                            <th class="d-none d-lg-table-cell">Specialization</th>
                            <th>Institute</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->teacher->stid ?? '-' }}</td>
                                <td>{{ $teacher->teacher->first_name ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $teacher->teacher->last_name ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $teacher->email }}</td>
                                <td class="d-none d-lg-table-cell">{{ $teacher->teacher->phone ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $teacher->teacher->qualification ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $teacher->teacher->specialization ?? '-' }}</td>
                                <td>{{ $teacher->teacher->institute->name ?? '-' }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <a href="{{ route('admin.teachers.show', $teacher->id) }}" class="text-secondary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="text-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" class="delete-teacher-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 border-0 bg-transparent text-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection

@section('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-teacher-form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
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
