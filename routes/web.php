<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ConfigurationController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', [ConfigurationController::class, 'index'])->name('index');

// Авторизация
Route::get('/login', [LoginController::class, 'index'])->name('loginForm');
Route::post('/login', [LoginController::class, 'store'])->name('login');

// Регистрация
Route::get('/register', [RegisterController::class, 'index'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::middleware(['auth', 'admin'])->group(function () {

    //Главная страница админ-панели
    Route::get('/admin-panel', [AdminController::class, 'index'])->name('adminPanelForm');
    Route::get('/admin-panel/create-item', [AdminController::class, 'create'])->name('categoryOfCreateItemForm');
    Route::get('/admin-panel/create-item/{componentTitle}', [AdminController::class, 'show'])->name('createItemForm');
});

Route::middleware(['auth'])->group(function () {

    // Сохранение конфигурации в мои сборки
    Route::post('/', [ConfigurationController::class, 'store'])->name('configuration');

    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Смена пароля
    Route::get('/profile/change-password', [ProfileController::class, 'edit'])->name('changePasswordForm');
    Route::post('/profile/change-password', [ProfileController::class, 'update'])->name('changePassword');

    // Выход из профиля
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Каталог
    Route::get('/{componentTitle}', [CatalogController::class, 'index'])->name('catalog');

    // Конкретный товар
    Route::get('/{componentTitle}/{componentId}', [CatalogController::class, 'show'])->name('component');
});
