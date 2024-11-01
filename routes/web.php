<?php

use App\Http\Controllers\Auth\AuthBladeController;
use App\Http\Controllers\Auth\AuthLogicController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website._welcome.index');
});


Route::prefix('register')->group(function () {
    Route::get('/', [AuthBladeController::class, 'register'])->name('register');
    Route::post('store', [AuthLogicController::class, 'register'])->name('register.store');
});
Route::prefix('login')->group(function () {
    Route::get('/', [AuthBladeController::class, 'login'])->name('login');
    Route::post('/store', [AuthLogicController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('logout', [AuthLogicController::class, 'logout'])->name('logout');

    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::post('/update', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });
});
