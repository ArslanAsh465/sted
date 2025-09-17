<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\AuthController;
// Admin Controller
use App\Http\Controllers\Backend\Admin\AdminDashboardController;
use App\Http\Controllers\Backend\Admin\AdminAdminsController;
use App\Http\Controllers\Backend\Admin\AdminModeratorsController;
use App\Http\Controllers\Backend\Admin\AdminInstitutesController;
use App\Http\Controllers\Backend\Admin\AdminTeachersController;
use App\Http\Controllers\Backend\Admin\AdminParentsController;
use App\Http\Controllers\Backend\Admin\AdminStudentsController;
use App\Http\Controllers\Backend\Admin\AdminNewsController;
use App\Http\Controllers\Backend\Admin\AdminDownloadsController;
use App\Http\Controllers\Backend\Admin\AdminGalleryController;

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
    //Dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    // Admins
    Route::prefix('admins')->name('admins.')->group(function () {
        Route::get('/', [AdminAdminsController::class, 'index'])->name('index');
        Route::get('/create', [AdminAdminsController::class, 'create'])->name('create');
        Route::post('/', [AdminAdminsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminAdminsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminAdminsController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminAdminsController::class, 'destroy'])->name('destroy');
    });

    // Moderators
    Route::prefix('moderators')->name('moderators.')->group(function () {
        Route::get('/', [AdminModeratorsController::class, 'index'])->name('index');
        Route::get('/create', [AdminModeratorsController::class, 'create'])->name('create');
        Route::post('/', [AdminModeratorsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminModeratorsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminModeratorsController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminModeratorsController::class, 'destroy'])->name('destroy');
    });

    // Institutes
    Route::prefix('institutes')->name('institutes.')->group(function () {
        Route::get('/', [AdminInstitutesController::class, 'index'])->name('index');
        Route::get('/create', [AdminInstitutesController::class, 'create'])->name('create');
        Route::post('/', [AdminInstitutesController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminInstitutesController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminInstitutesController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminInstitutesController::class, 'destroy'])->name('destroy');
    });

    // Teachers
    Route::prefix('teachers')->name('teachers.')->group(function () {
        Route::get('/', [AdminTeachersController::class, 'index'])->name('index');
        Route::get('/create', [AdminTeachersController::class, 'create'])->name('create');
        Route::post('/', [AdminTeachersController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminTeachersController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminTeachersController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminTeachersController::class, 'destroy'])->name('destroy');
    });

    // Parents
    Route::prefix('parents')->name('parents.')->group(function () {
        Route::get('/', [AdminParentsController::class, 'index'])->name('index');
        Route::get('/create', [AdminParentsController::class, 'create'])->name('create');
        Route::post('/', [AdminParentsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminParentsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminParentsController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminParentsController::class, 'destroy'])->name('destroy');
    });

    // Students
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/', [AdminStudentsController::class, 'index'])->name('index');
        Route::get('/create', [AdminStudentsController::class, 'create'])->name('create');
        Route::post('/', [AdminStudentsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminStudentsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminStudentsController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminStudentsController::class, 'destroy'])->name('destroy');
    });

    // News
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::get('/create', [AdminNewsController::class, 'create'])->name('create');
        Route::post('/', [AdminNewsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminNewsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminNewsController::class, 'destroy'])->name('destroy');
    });

    // Downloads
    Route::resource('downloads', AdminDownloadsController::class)->names('downloads');

    // Gallery
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', [AdminGalleryController::class, 'index'])->name('index');
        Route::get('/create', [AdminGalleryController::class, 'create'])->name('create');
        Route::post('/', [AdminGalleryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminGalleryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminGalleryController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminGalleryController::class, 'destroy'])->name('destroy');
    });
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
