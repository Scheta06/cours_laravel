@extends('layouts.app')
@section('content')
    <main class="main admin-page">
        <div class="container">
            <!-- Хлебные крошки -->
            <div class="breadcrumbs">
                <a href="{{ route('index') }}">Главная</a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('profile') }}">Профиль</a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('adminPanelForm') }}">Админ-панель</a>
                <i class="fas fa-chevron-right"></i>
                <span>Управление товарами</span>
            </div>

            <div class="admin-header">
                <h1 class="page-title">
                    <i class="fas fa-boxes"></i> Управление товарами
                </h1>
                <a href="{{ route('categoryOfCreateItemForm') }}" class="btn btn-primary">
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
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
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
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Процессор 1 -->
                        @foreach ($data as $key => $value)
                            @foreach ($value as $item)
                                <tr data-category="cpu">
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a
                                            href="{{ route('component', ['componentTitle' => $item->category->type, 'componentId' => $item->id]) }}">
                                            {{ $item->vendor->title }}
                                            @if ($item->category_id === 2)
                                                {{ $item->chipset->title }}
                                            @endif

                                            {{ $item->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="category-badge cpu">
                                            {{ $item->category->title }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('editItemForm', ['componentId' => $item->id, 'componentTitle' => $item->category->type]) }}"
                                                class="btn btn-sm btn-outline">
                                                <i class="fas fa-edit"></i> Изменить
                                            </a>
                                            <form
                                                action="{{ route('deleteItem', ['componentTitle' => $item->category->type, 'componentId' => $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit" data-id="1001">
                                                    <i class="fas fa-trash"></i> Удалить
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach


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
