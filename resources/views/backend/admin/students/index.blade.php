@extends('backend.admin.layout.app')

@section('title', 'Students')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Students</li>
            </ol>
        </nav>

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Students</h1>
            </div>
            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.students.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Add Student
                </a>
            </div>
        </div>
    </div>

    <!-- Students Table -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        @if($students->isEmpty())
            <p class="mb-0">No students found.</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SSID</th>
                            <th>Roll No</th>
                            <th>First Name</th>
                            <th class="d-none d-lg-table-cell">Last Name</th>
                            <th class="d-none d-lg-table-cell">Email</th>
                            <th>Parent</th>
                            <th class="d-none d-lg-table-cell">DOB</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            @php
                                $profile = $student->student;
                                $parent = $profile->parent ?? null;
                            @endphp
                            <tr>
                                <td>{{ $profile->ssid ?? '-' }}</td>
                                <td>{{ $profile->roll_no ?? '-' }}</td>
                                <td>{{ $profile->first_name ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $profile->last_name ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $student->email ?? '-' }}</td>
                                <td>
                                    {{ $parent?->first_name }} {{ $parent?->last_name }}
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    {{ $profile->date_of_birth ? \Carbon\Carbon::parse($profile->date_of_birth)->format('Y-m-d') : '-' }}
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.students.show', $student->id) }}" class="text-secondary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.students.edit', $student->id) }}" class="text-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="delete-student-form d-inline">
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

    {{-- SweetAlert Notification --}}
    @include('backend.alert')
@endsection

@section('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-student-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
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
