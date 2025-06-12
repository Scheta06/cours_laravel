@extends('layouts.app')
@section('content')
<main class="main admin-page">
        <div class="container">
            <!-- Хлебные крошки -->
            <div class="breadcrumbs">
                <a href="index.html">Главная</a>
                <i class="fas fa-chevron-right"></i>
                <a href="admin.html">Админ-панель</a>
                <i class="fas fa-chevron-right"></i>
                <span>Управление товарами</span>
            </div>

            <div class="admin-header">
                <h1 class="page-title">
                    <i class="fas fa-boxes"></i> Управление товарами
                </h1>
                <a href="admin-new-product.html" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Добавить товар
                </a>
            </div>

            <!-- Фильтры -->
            <div class="filters-card">
                <div class="filter-group">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="search-input" placeholder="Поиск по названию...">
                    </div>

                    <div class="filter-controls">
                        <select id="category-filter">
                            <option value="">Все категории</option>
                            <option value="cpu">Процессоры</option>
                            <option value="motherboard">Материнские платы</option>
                            <option value="ram">Оперативная память</option>
                            <option value="gpu">Видеокарты</option>
                            <option value="storage">Накопители</option>
                            <option value="psu">Блоки питания</option>
                            <option value="case">Корпуса</option>
                            <option value="cooling">Охлаждение</option>
                        </select>

                        <button id="reset-filters" class="btn btn-outline">
                            <i class="fas fa-undo"></i> Сбросить
                        </button>
                    </div>
                </div>
            </div>

            <!-- Таблица товаров -->
            <div class="products-table-container">
                <table class="products-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Цена</th>
                            <th>Наличие</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Процессор 1 -->
                        <tr data-category="cpu">
                            <td>1001</td>
                            <td>
                                <div class="product-image">
                                    <img src="https://via.placeholder.com/60" alt="AMD Ryzen 5 5600X">
                                </div>
                            </td>
                            <td>AMD Ryzen 5 5600X</td>
                            <td>
                                <span class="category-badge cpu">
                                    <i class="fas fa-microchip"></i> Процессор
                                </span>
                            </td>
                            <td>18 499 ₽</td>
                            <td>
                                <span class="stock in-stock">В наличии (12)</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="admin-edit-product.html?id=1001" class="btn btn-sm btn-outline">
                                        <i class="fas fa-edit"></i> Изменить
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-id="1001">
                                        <i class="fas fa-trash"></i> Удалить
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Материнская плата -->
                        <tr data-category="motherboard">
                            <td>1002</td>
                            <td>
                                <div class="product-image">
                                    <img src="https://via.placeholder.com/60" alt="ASUS ROG Strix B550-F">
                                </div>
                            </td>
                            <td>ASUS ROG Strix B550-F</td>
                            <td>
                                <span class="category-badge motherboard">
                                    <i class="fas fa-project-diagram"></i> Материнская плата
                                </span>
                            </td>
                            <td>14 999 ₽</td>
                            <td>
                                <span class="stock in-stock">В наличии (5)</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="admin-edit-product.html?id=1002" class="btn btn-sm btn-outline">
                                        <i class="fas fa-edit"></i> Изменить
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-id="1002">
                                        <i class="fas fa-trash"></i> Удалить
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Оперативная память -->
                        <tr data-category="ram">
                            <td>1003</td>
                            <td>
                                <div class="product-image">
                                    <img src="https://via.placeholder.com/60" alt="Kingston Fury 16GB DDR4">
                                </div>
                            </td>
                            <td>Kingston Fury 16GB DDR4</td>
                            <td>
                                <span class="category-badge ram">
                                    <i class="fas fa-memory"></i> Оперативная память
                                </span>
                            </td>
                            <td>4 299 ₽</td>
                            <td>
                                <span class="stock low-stock">Мало (2)</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="admin-edit-product.html?id=1003" class="btn btn-sm btn-outline">
                                        <i class="fas fa-edit"></i> Изменить
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-id="1003">
                                        <i class="fas fa-trash"></i> Удалить
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Видеокарта -->
                        <tr data-category="gpu">
                            <td>1004</td>
                            <td>
                                <div class="product-image">
                                    <img src="https://via.placeholder.com/60" alt="NVIDIA RTX 3060 Ti">
                                </div>
                            </td>
                            <td>NVIDIA RTX 3060 Ti</td>
                            <td>
                                <span class="category-badge gpu">
                                    <i class="fas fa-gamepad"></i> Видеокарта
                                </span>
                            </td>
                            <td>39 999 ₽</td>
                            <td>
                                <span class="stock out-of-stock">Нет в наличии</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="admin-edit-product.html?id=1004" class="btn btn-sm btn-outline">
                                        <i class="fas fa-edit"></i> Изменить
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-id="1004">
                                        <i class="fas fa-trash"></i> Удалить
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Пагинация -->
                <div class="pagination">
                    <button class="btn btn-outline" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-outline active">1</button>
                    <button class="btn btn-outline">2</button>
                    <button class="btn btn-outline">3</button>
                    <button class="btn btn-outline">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
