<?php

use App\Livewire\Home;
use App\Livewire\Register;
use App\Livewire\AdminLogin;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', Home::class)->name('home');

Route::get('/register/{id}', Register::class)->name('register');

Route::get('/login', AdminLogin::class)->name('login');

Route::get('/admin', Dashboard::class)->name('admin')->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
