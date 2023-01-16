<?php

use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get("/dashboard", [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get("/login", [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post("/login", [LoginController::class, 'store'])->middleware('guest');

Route::post("/logout", [LogoutController::class, 'store'])->name('logout');




// admin routes
Route::get("/admin", [AdminController::class, 'index'])->name('admin');
Route::get("/admin/{user}",[AdminController::class, 'show'])->name('admin.show');
Route::get("/admin/{user}/edit",[AdminController::class, 'edit'])->name('admin.edit');
Route::delete("/admin/{user}",[AdminController::class, 'delete'])->name('admin.delete');

Route::get("/register", [RegisterController::class, 'index'])->name('register');
Route::post("/register", [RegisterController::class, 'store'])->name('admin.register');
Route::put("/register/{user}", [RegisterController::class, 'update'])->name('register.update');

