@extends('auth.layout.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">

            {{-- Heading --}}
            <h3 class="text-center text-primary mb-4">Register</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter username" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    @php
                        use App\Helpers\Constants;

                        $roles = [
                            Constants::ROLE_INSTITUTE => 'Institute',
                            Constants::ROLE_TEACHER   => 'Teacher',
                            Constants::ROLE_PARENT    => 'Parent',
                            Constants::ROLE_STUDENT   => 'Student',
                        ];
                    @endphp
                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="" disabled selected>Select a role</option>
                        @foreach($roles as $key => $label)
                            <option value="{{ $key }}" {{ old('role') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

            {{-- Link to Login page --}}
            <div class="text-center mt-3">
                <span>Already have an account?</span>
                <a href="{{ route('loginForm') }}" class="text-primary text-decoration-none ms-1">Login</a>
            </div>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
