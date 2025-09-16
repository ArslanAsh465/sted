<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;

class AuthController extends Controller
{
    public function registerForm()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard(Auth::user());
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users,email',
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
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('loginForm')
            ->with('alert_type', 'success')
            ->with('alert_message', 'You have been registered successfully!');
    }

    public function loginForm()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard(Auth::user());
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return redirect()->back()
                ->withInput()
                ->with('alert_type', 'error')
                ->with('alert_message', 'Invalid email or password.');
        }

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

        $routeName = $roleRedirects[(int)$user->role] ?? null;

        if ($routeName && Route::has($routeName)) {
            $finalRedirectUrl = route($routeName);
            return redirect()->intended($finalRedirectUrl);
        }

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginForm')
            ->with('alert_type', 'success')
            ->with('alert_message', 'You have been logged out.');
    }

    private function redirectToDashboard(User $user)
    {
        $roleRedirects = [
            Constants::ROLE_ADMIN     => 'admin.dashboard',
            Constants::ROLE_MODERATOR => 'moderator.dashboard',
            Constants::ROLE_INSTITUTE => 'institute.dashboard',
            Constants::ROLE_TEACHER   => 'teacher.dashboard',
            Constants::ROLE_PARENT    => 'parent.dashboard',
            Constants::ROLE_STUDENT   => 'student.dashboard',
        ];

        $routeName = $roleRedirects[(int)$user->role] ?? null;

        if ($routeName && Route::has($routeName)) {
            return redirect()->route($routeName);
        }

        return redirect('/'); // fallback if no route matches
    }
}
