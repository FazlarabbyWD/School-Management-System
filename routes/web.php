<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



//Auth API

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'AuthLogin']);
Route::get('/logout', [AuthController::class, 'Logout']);



//Admin API

Route::get('admin/dashboard', function () {
    return view('Admin.dashboard');
});

Route::get('admin/list', function () {
    return view('Admin.list');
});

Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'Dashboard']);
});





//Teacher API
Route::middleware(['teacher'])->group(function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'Dashboard']);
});




//Student API
Route::middleware(['student'])->group(function () {
    Route::get('student/dashboard', [DashboardController::class, 'Dashboard']);
});




//Parent API
Route::middleware(['parent'])->group(function () {
    Route::get('parent/dashboard', [DashboardController::class, 'Dashboard']);
});
