@extends('backend.admin.layout.app')

@section('title', 'Edit Admin')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}" class="text-decoration-none">Admins</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Edit Admin</h1>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username', $admin->username) }}" class="form-control @error('username') is-invalid @enderror" required autofocus>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $admin->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-4">
                    <label for="password" class="form-label">
                        New Password <small class="text-muted">(leave blank to keep current)</small>
                    </label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-4">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Update Admin</button>
                </div>
            </div>
        </form>
    </div>
@endsection
