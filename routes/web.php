<?php

use App\Livewire\Admin\AddCourses as AdminAddCourse;
use App\Livewire\Admin\Course as AdminCourse;
use App\Livewire\Admin\Courses as AdminCourses;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\auth\AdminLogin;
use App\Livewire\auth\CustomerLogin;
use App\Livewire\auth\Register;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Guest routes

Route::get('/', Home::class)->name('home');

Route::get('/course/{id}', \App\Livewire\Course::class)->name('course');

Route::get('/register', Register::class)->name('register');

Route::get('/login', CustomerLogin::class)->name('login');

// Customer routes

Route::prefix('')->middleware(['check.user.type:user'])->group(function () {
    Route::get('/dashboard', Home::class)->name('dashboard');
});


// Admin routes

Route::prefix('admin')->middleware(['check.user.type:admin'])->group(function () {
    Route::get('/');
    Route::get('/login', AdminLogin::class)->name('admin.login')->withoutMiddleware(['check.user.type:admin']);
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/courses', AdminCourses::class)->name('admin.courses');
    Route::get('/course/{id}', AdminCourse::class)->name('admin.course');
    Route::get('/add-courses', AdminAddCourse::class)->name('admin.addCourse');
    Route::get('/add-trainer', \App\Livewire\Admin\AddTrainer::class)->name('admin.addTrainer');
});
