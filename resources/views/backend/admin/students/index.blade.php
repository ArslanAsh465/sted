@extends('backend.admin.layout.app')

@section('title', 'Students Data')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Students Data</h1>
        </div>

        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
                Add New Student
            </a>
        </div>
    </div>

    <!-- Students Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">List of Students</h5>
        </div>

        <div class="card-body">
            @if($students->isEmpty())
                <p>No students found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>SSID</th>
                                <th>Roll No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Parent</th>
                                <th>Date of Birth</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->student->ssid ?? '-' }}</td>
                                    <td>{{ $student->student->roll_no ?? '-' }}</td>
                                    <td>{{ $student->student->first_name ?? '-' }}</td>
                                    <td>{{ $student->student->last_name ?? '-' }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        {{ $student->student->parent->first_name ?? '-' }}
                                        {{ $student->student->parent->last_name ?? '' }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($student->student->date_of_birth)->format('Y-m-d') ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline-block;" class="delete-student-form">
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
            document.querySelectorAll('.delete-student-form').forEach(function(form) {
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
