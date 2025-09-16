@extends('backend.admin.layout.app')

@section('title', 'Teachers Data')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Teachers Data</h1>
        </div>

        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">
                Add New Teacher
            </a>
        </div>
    </div>

    <!-- Teachers Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">List of Teachers</h5>
        </div>

        <div class="card-body">
            @if($teachers->isEmpty())
                <p>No teachers found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>STID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Qualification</th>
                                <th>Specialization</th>
                                <th>Institute</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->teacher->stid ?? '-' }}</td>
                                    <td>{{ $teacher->teacher->first_name ?? '-' }}</td>
                                    <td>{{ $teacher->teacher->last_name ?? '-' }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->teacher->phone ?? '-' }}</td>
                                    <td>{{ $teacher->teacher->qualification ?? '-' }}</td>
                                    <td>{{ $teacher->teacher->specialization ?? '-' }}</td>
                                    <td>{{ $teacher->teacher->institute->name ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;" class="delete-teacher-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection

@section('scripts')
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
