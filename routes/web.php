<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EmployeeToolsController;
use App\Http\Controllers\AdminController;




Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cars', CarController::class);
Route::get('/', [MainController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
Route::middleware([CheckRole::class . ':user'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
});
Route::get('/reservations/create/{car_id}', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::aliasMiddleware('role', \App\Http\Middleware\CheckRole::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
});

Route::middleware(['auth', 'role:employee,admin'])->group(function () {
    Route::get('/employee/tools', [EmployeeToolsController::class, 'index'])->name('employee.tools');
});
Route::middleware(['auth', 'role:employee,admin'])->group(function () {
    Route::get('/employee/tools', [EmployeeToolsController::class, 'index'])->name('employee.tools');
    Route::post('/employee/reservations/{id}/status', [EmployeeToolsController::class, 'updateReservationStatus'])->name('employee.reservations.updateStatus');
    Route::delete('/employee/reservations/{id}', [EmployeeToolsController::class, 'destroyReservation'])->name('employee.reservations.delete');
});
Route::middleware(['auth', 'role:employee,admin'])->group(function () {
    Route::get('/employee/tools', [EmployeeToolsController::class, 'index'])->name('employee.tools');
    Route::post('/employee/reservations/{id}/status', [EmployeeToolsController::class, 'updateReservationStatus'])->name('employee.reservations.updateStatus');
    Route::delete('/employee/reservations/{id}', [EmployeeToolsController::class, 'destroyReservation'])->name('employee.reservations.delete');

    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
    Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::put('/admin/users/{id}/role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');
});
