<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConfigurationController;

Route::get('/', [ConfigurationController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('loginForm');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('/',[ConfigurationController::class, 'store'])->name('configuration');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/profile/change-password', [ProfileController::class, 'create'])->name('changePasswordForm');
    Route::post('/profile/change-password', [ProfileController::class, 'store'])->name('changePassword');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/{component_title}', [CatalogController::class, 'index'])->name('catalog');
    Route::get('/{componentTitle}/{componentId}', [CatalogController::class, 'index'])->name('component');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-panel', [AdminController::class, 'index'])->name('adminPanelForm');
    Route::get('/admin-panel/{components}', [AdminController::class, 'show'])->name('');
    Route::get('/admin-panel/{components}/{component}', [AdminController::class, 'create'])->name('componentCreateForm');
    Route::post('/admin-panel/{components}/{component}', [AdminController::class, 'store'])->name('componentCreate');
    Route::delete('/admin-panel/{components}/{component}', [AdminController::class, 'destroy'])->name('destroyCreate');
});
