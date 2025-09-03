@extends('auth.layout.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            
            {{-- Heading --}}
            <x-heading level="h3" class="mb-4 text-center" variant="primary" text="Register" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Username --}}
                <div class="mb-3">
                    <x-label for="username" text="Username" class="form-label" />
                    <x-input type="text" name="username" id="username" placeholder="Enter username" :value="old('username')" required />
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <x-label for="password" text="Password" class="form-label" />
                    <x-input type="password" name="password" id="password" placeholder="Enter password" required />
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <x-label for="password_confirmation" text="Confirm Password" class="form-label" />
                    <x-input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required />
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <x-label for="role" text="Role" class="form-label" />
                    @php
                        use App\Helpers\Constants;

                        $roles = [
                            Constants::ROLE_INSTITUTE => 'Institute',
                            Constants::ROLE_TEACHER   => 'Teacher',
                            Constants::ROLE_PARENT    => 'Parent',
                            Constants::ROLE_STUDENT   => 'Student',
                        ];
                    @endphp
                    <x-select name="role" id="role" class="form-select" :options="$roles"  :selected="old('role')" required="required" />
                </div>

                {{-- Submit Button --}}
                <div class="mt-3">
                    <x-button type="submit" text="Register" variant="primary" class="w-100" />
                </div>
            </form>

            {{-- Link to Login page --}}
            <div class="text-center mt-3">
                <span>Already have an account?</span>
                <x-link href="{{ route('loginPage') }}" text="Login" variant="primary" class="text-decoration-none ms-1" />
            </div>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    <x-alert />
@endsection
