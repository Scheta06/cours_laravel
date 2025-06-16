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
    Route::get('/admin', [AdminController::class, 'index'])->name('adminPanelForm');
    // Управление товарами (редактирование и удаление)
    Route::get('/admin/manage-item', [AdminController::class, 'items'])->name('manageItemForm');
    Route::delete('/admin/manage-item/{componentTitle}/{componentId}', [AdminController::class, 'destroy'])->name('deleteItem');
    Route::get('/admin/manage-item/{componentTitle}/{componentId}/edit', [AdminController::class, 'edit'])->name('editItemForm');
    Route::put('/admin/manage-item/{componentTitle}/{componentId}', [AdminController::class, 'update'])->name('updateItemForm');
    // Создание товара
    Route::get('/admin/create-item', [AdminController::class, 'category'])->name('categoryOfCreateItemForm');
    Route::get('/admin/create-item/{componentTitle}', [AdminController::class, 'create'])->name('createItemForm');
    Route::post('/admin/create-item/{componentTitle}', [AdminController::class, 'store'])->name('storeItemForm');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/my-configuration', [Configuration::class, 'index'])->name('userConfigrationForm');

    // Сохранение конфигурации в мои сборки
    Route::post('/', [ConfigurationController::class, 'update'])->name('configuration');
    Route::delete('/{configurationId}', [ConfigurationController::class, 'destroy'])->name('deleteConfiguration');

    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Смена пароля
    Route::get('/profile/change-password', [ProfileController::class, 'edit'])->name('changePasswordForm');
    Route::post('/profile/change-password', [ProfileController::class, 'update'])->name('changePassword');

    // Выход из профиля
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Каталог
    Route::get('/catalog/{componentTitle}', [CatalogController::class, 'index'])->name('catalog');

    // Конкретный товар
    Route::get('/catalog/{componentTitle}/{componentId}', [CatalogController::class, 'show'])->name('component');
    Route::post('/catalog/{componentTitle}/{componentId}', [ConfigurationController::class, 'store'])->name('storeComponent');
});
