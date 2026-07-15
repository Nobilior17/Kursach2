<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Студенческие маршруты (для всех авторизованных)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Админские маршруты (только для админов)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('subjects', SubjectController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('results', ResultController::class);
    
    Route::get('/users', function () {
        $users = \App\Models\User::where('role', 'student')->get();
        return view('admin.users', compact('users'));
    })->name('users');
});

// Если кто-то попытается зайти на регистрацию — перенаправить на логин
Route::get('/register', function () {
    return redirect('/login');
})->name('register');

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

require __DIR__.'/auth.php';