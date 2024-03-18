<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListMenuController;
use App\Http\Controllers\TeamController;
use App\Models\User;
use Faker\Guesser\Name;

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
// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Menu
Route::get('/menu', [ListMenuController::class, 'index'])->name('menu');

// Team
Route::get('/team', [TeamController::class, 'index'])->name('team');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index')->middleware('auth');

// Menu
Route::get('/admin/menu', [MenuController::class, 'index'])->name('admin.menu.index');
Route::post('/admin/menu', [MenuController::class, 'store'])->name('admin.menu.store');
Route::put('/menu/edit/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
Route::delete('/menu/{id}', [MenuController::class, 'delete'])->name('admin.menu.destroy');

// Chef
Route::get('/chef', [ChefController::class, 'index'])->name('admin.chef.index');
Route::post('/chef', [ChefController::class, 'store'])->name('admin.chef.store');
Route::put('/chef/{id}', [ChefController::class, 'update'])->name('admin.chef.update');
Route::delete('/chef/{id}', [ChefController::class, 'destroy'])->name('admin.chef.destroy');

// Tables
Route::get('/table', [TableController::class, 'index'])->name('admin.tables.index');
Route::post('/table', [TableController::class, 'store'])->name('admin.tables.store');
Route::put('/table/{id}', [TableController::class, 'update'])->name('admin.tables.update');
Route::delete('/table/{id}', [TableController::class, 'delete'])->name('admin.tables.delete');

// Booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking')->middleware('auth');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/admin/booking', [BookingController::class, 'admin'])->name('admin.booking.index');

// User
Route::get('/user', [RegisterController::class, 'user'])->name('admin.user.index');