@extends('backend.admin.layout.app')

@section('title', "Moderator's Data")

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Moderator's Data</h1>
        </div>

        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.moderators.create') }}" class="btn btn-primary">
                Add New Moderator
            </a>
        </div>
    </div>

    <!-- Moderators Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">List of Moderators</h5>
        </div>

        <div class="card-body">
            @if($moderators->isEmpty())
                <p>No moderators found.</p>
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
                            @foreach($moderators as $moderator)
                                <tr>
                                    <td>{{ $moderator->id }}</td>
                                    <td>{{ $moderator->username }}</td>
                                    <td>{{ $moderator->email }}</td>
                                    <td>{{ $moderator->email_verified_at ? $moderator->email_verified_at->diffForHumans() : 'Not Verified' }}</td>
                                    <td>{{ $moderator->is_verified ? 'Yes' : 'No' }}</td>
                                    <td>{{ $moderator->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.moderators.edit', $moderator->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('admin.moderators.destroy', $moderator->id) }}" method="POST" style="display:inline-block;" class="delete-moderator-form">
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
            document.querySelectorAll('.delete-moderator-form').forEach(function(form) {
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
