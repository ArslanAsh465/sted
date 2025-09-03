@extends('auth.layout.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        @include('auth.components.heading', [
            'level' => 'h3', 
            'class' => 'mb-4 text-center', 
            'variant' => 'primary', 
            'text' => 'Register'
        ])

        <form method="POST" action="#">
            @csrf

            @include('auth.components.input', [
                'type' => 'text',
                'name' => 'username',
                'label' => 'Username',
                'placeholder' => 'Enter username',
                'value' => old('username'),
                'required' => true,
                'id' => 'username',
                'class' => 'mb-3'
            ])

            @include('auth.components.input', [
                'type' => 'password',
                'name' => 'password',
                'label' => 'Password',
                'placeholder' => 'Enter password',
                'required' => true,
                'id' => 'password',
                'class' => 'mb-3'
            ])

            @include('auth.components.input', [
                'type' => 'password',
                'name' => 'password_confirmation',
                'label' => 'Confirm Password',
                'placeholder' => 'Confirm password',
                'required' => true,
                'id' => 'password_confirmation',
                'class' => 'mb-3'
            ])

            @include('auth.components.select', [
                'name' => 'role',
                'label' => 'Role',
                'options' => [
                    1 => 'Institue',
                    2 => 'Teacher',
                    3 => 'Parent',
                    4 => 'Student'
                ],
                'selected' => old('role'),
                'id' => 'role',
                'class' => 'mb-3',
                'required' => true
            ])

            @include('auth.components.button', [
                'type' => 'submit',
                'text' => 'Register',
                'variant' => 'primary',
                'class' => 'w-100 mt-3',
            ])
        </form>
    </div>
</div>
@endsection
