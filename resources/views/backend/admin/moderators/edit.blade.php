@extends('backend.admin.layout.app')

@section('title', 'Edit Moderator')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Edit Moderator</h1>
        </div>
    </div>

    <!-- Edit Moderator Form -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Update Moderator Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.moderators.update', $moderator->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        value="{{ old('username', $moderator->username) }}" 
                        class="form-control @error('username') is-invalid @enderror" 
                        required 
                        autofocus
                    >
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email', $moderator->email) }}" 
                        class="form-control @error('email') is-invalid @enderror" 
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        New Password 
                        <small class="text-muted">(leave blank to keep current)</small>
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        autocomplete="new-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        autocomplete="new-password"
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Update Moderator</button>
            </form>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
