<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
});

require __DIR__.'/auth.php';
