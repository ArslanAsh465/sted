@extends('backend.admin.layout.app')

@section('title', "Admin's Data")

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <!-- Left Column: Page Heading -->
        <div class="col-md-9">
            <h1 class="h3 mb-0">Admin's Data</h1>
        </div>

        <!-- Right Column: Button or any other content -->
        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
                Add New Admin
            </a>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">List of Admins</h5>
        </div>

        <div class="card-body">
            @if($admins->isEmpty())
                <p>No admin users found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Email Verified</th>
                                <th>Verified</th>
                                <th>Registered</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->email_verified_at ? $admin->email_verified_at->diffForHumans() : 'Not Verified' }}</td>
                                    <td>{{ $admin->is_verified ? 'Yes' : 'No' }}</td>
                                    <td>{{ $admin->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display:inline-block;" class="delete-admin-form">
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
            document.querySelectorAll('.delete-admin-form').forEach(function(form) {
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