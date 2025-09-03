@extends('auth.layout.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        @include('auth.components.heading', ['level' => 'h3', 'class' => 'mb-4 text-center', 'variant' => 'primary', 'text' => 'Login'])

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
                'class' => 'mb-4'
            ])

            @include('auth.components.input', [
                'type' => 'password',
                'name' => 'password',
                'label' => 'Password',
                'placeholder' => 'Enter password',
                'required' => true
            ])

            @include('auth.components.button', [
                'type' => 'submit',
                'text' => 'Login',
                'variant' => 'primary',
                'class' => 'w-100 mt-3',
            ])
        </form>
    </div>
</div>
@endsection
