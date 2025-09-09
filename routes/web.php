<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\Admin\AdminDashboardController;
use App\Http\Controllers\Backend\Moderator\ModeratorDashboardController;
use App\Http\Controllers\Backend\Institute\InstituteDashboardController;
use App\Http\Controllers\Backend\Teacher\TeacherDashboardController;
use App\Http\Controllers\Backend\Parent\ParentDashboardController;
use App\Http\Controllers\Backend\Student\StudentDashboardController;

// Frontend Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/exams', [HomeController::class, 'exams'])->name('exams');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/rankings', [HomeController::class, 'rankings'])->name('rankings');
Route::get('/downloads', [HomeController::class, 'downloads'])->name('downloads');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/terms-of-service', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');

// Auth Routes
// Register
Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Backend Routes
// Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
});

// Moderator
Route::middleware(['auth'])->prefix('moderator')->name('moderator.')->group(function () {
    Route::get('/dashboard', [ModeratorDashboardController::class, 'dashboard'])->name('dashboard');
});

// Institute
Route::middleware(['auth'])->prefix('institute')->name('institute.')->group(function () {
    Route::get('/dashboard', [InstituteDashboardController::class, 'dashboard'])->name('dashboard');
});

// Teacher
Route::middleware(['auth'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'dashboard'])->name('dashboard');
});

// Parent
Route::middleware(['auth'])->prefix('parent')->name('parent.')->group(function () {
    Route::get('/dashboard', [ParentDashboardController::class, 'dashboard'])->name('dashboard');
});

// Student
Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'dashboard'])->name('dashboard');
});