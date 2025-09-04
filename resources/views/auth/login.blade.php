@extends('auth.layout.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            
            {{-- Heading --}}
            <x-heading level="h3" class="mb-4 text-center" variant="primary" text="Login" />

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Username --}}
                <div class="mb-3">
                    <x-label for="username" text="Username" class="form-label" />
                    <x-input name="username" id="username" placeholder="Enter your username" required />
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <x-label for="password" text="Password" class="form-label" />
                    <x-input type="password" name="password" id="password" placeholder="Enter your password" required />
                </div>

                {{-- Submit Button --}}
                <div class="mt-3">
                    <x-button type="submit" text="Login" variant="primary" class="w-100" />
                </div>
            </form>

            <div class="text-center mt-3">
                <span>Don't have an account?</span>
                <x-link href="{{ route('registerPage') }}" text="Register" variant="primary" class="text-decoration-none" />
            </div>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    <x-alert />
@endsection
