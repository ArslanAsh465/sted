<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|in:' . implode(',', [
                Constants::ROLE_INSTITUTE,
                Constants::ROLE_TEACHER,
                Constants::ROLE_PARENT,
                Constants::ROLE_STUDENT,
            ]),
        ]);

        if ($validator->fails()) {
            $errors = implode('<br>', $validator->errors()->all());

            return redirect()->back()
                ->withInput()
                ->with('alert_type', 'error')
                ->with('alert_message', $errors);
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('loginPage')
            ->with('alert_type', 'success')
            ->with('alert_message', 'You have been registered successfully!');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $roleRedirects = [
                Constants::ROLE_ADMIN     => 'admin.dashboard',
                Constants::ROLE_MODERATOR => 'moderator.dashboard',
                Constants::ROLE_INSTITUTE => 'institute.dashboard',
                Constants::ROLE_TEACHER   => 'teacher.dashboard',
                Constants::ROLE_PARENT    => 'parent.dashboard',
                Constants::ROLE_STUDENT   => 'student.dashboard',
            ];

            $roleKey = (int)$user->role;

            $route = $roleRedirects[$roleKey] ?? 'loginPage';

            return redirect()->route($route)
                ->with('alert_type', 'success')
                ->with('alert_message', 'Login successful!');
        }

        return redirect()->back()
            ->withInput()
            ->with('alert_type', 'error')
            ->with('alert_message', 'Invalid username or password.');
    }
}
