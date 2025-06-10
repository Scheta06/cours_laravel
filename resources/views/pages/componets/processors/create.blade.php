@extends('layouts.app')

@section('content')
    <main class="main admin-page">
        <div class="container">
            <!-- Хлебные крошки -->
            <div class="breadcrumbs">
                <a href="{{ route('index') }}">Главная</a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('adminPanelForm') }}">Админ-панель</a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('categoryOfCreateItemForm') }}">Товары</a>
                <i class="fas fa-chevron-right"></i>
                <span>Новый процессор</span>
            </div>

            <h1 class="page-title">
                <i class="fas fa-microchip"></i> Создать новый процессор
            </h1>

            <div class="admin-form-container">
                <form class="product-form">
                    <!-- Основная информация -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-info-circle"></i> Основная информация
                        </h2>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="product-name">Название*</label>
                                <input type="text" id="product-name" name="title" placeholder="Например, AMD Ryzen 5 5600X" required>
                            </div>

                            <div class="form-group">
                                <label for="product-manufacturer">Производитель*</label>
                                <select id="product-manufacturer" required>
                                    <option value="">Выберите производителя</option>
                                    <option value="amd">AMD</option>
                                    <option value="intel">Intel</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product-socket">Сокет*</label>
                                <select id="product-socket" required>
                                    <option value="">Выберите сокет</option>
                                    <option value="am4">AM4</option>
                                    <option value="am5">AM5</option>
                                    <option value="lga1700">LGA 1700</option>
                                    <option value="lga1200">LGA 1200</option>
                                </select>
                            </div>

                            <div class="form-group full-width">
                                <label for="product-description">Описание*</label>
                                <textarea id="product-description" rows="4" name="description" placeholder="Описание процессора..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Технические характеристики -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-cogs"></i> Технические характеристики
                        </h2>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="cpu-cores">Количество ядер*</label>
                                <input type="number" id="cpu-cores" min="1" max="64" placeholder="6" required>
                            </div>

                            <div class="form-group">
                                <label for="cpu-threads">Количество потоков*</label>
                                <input type="number" id="cpu-threads" min="1" max="128" placeholder="12"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="cpu-base-freq">Базовая частота (ГГц)*</label>
                                <input type="number" id="cpu-base-freq" step="0.1" min="0.5" max="6.0"
                                    placeholder="3.7" required>
                            </div>

                            <div class="form-group">
                                <label for="cpu-max-freq">Макс. частота (ГГц)</label>
                                <input type="number" id="cpu-max-freq" step="0.1" min="0.5" max="6.0"
                                    placeholder="4.6">
                            </div>

                            <div class="form-group">
                                <label for="cpu-cache">Кэш L3 (МБ)</label>
                                <input type="number" id="cpu-cache" min="1" max="256" placeholder="32">
                            </div>

                            <div class="form-group">
                                <label for="cpu-tdp">TDP (Вт)</label>
                                <input type="number" id="cpu-tdp" min="10" max="300" placeholder="65">
                            </div>
                        </div>
                    </div>

                    <!-- Кнопки отправки -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">
                            <i class="fas fa-times"></i> Отменить
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Сохранить процессор
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
