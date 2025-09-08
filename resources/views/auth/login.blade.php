@extends('auth.layout.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            
            {{-- Heading --}}
            <h3 class="text-center text-primary mb-4">Login</h3>

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Username --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>

                {{-- Submit Button --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            {{-- Register Link --}}
            <div class="text-center mt-3">
                <span>Don't have an account? </span>
                <a href="{{ route('registerForm') }}" class="text-primary">Register</a>
            </div>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
