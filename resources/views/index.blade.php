@extends('layouts.app')

@section('content')
    <main class="main">
        <section class="build-creator">
            <div class="container">
                <form class="build-form" action="{{ route('configuration') }}" method="POST">
                    <h1 class="section-title" style="text-align: center">Создать новую сборку</h1>
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="build-name">Название сборки*</label>
                        <input type="text" id="build-name" placeholder="Например: Игровой ПК до 100 000₽" name="title"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="build-desc">Описание</label>
                        <textarea id="build-desc" placeholder="Опишите назначение сборки (игры, работа, дизайн)..." rows="3"
                            name="description"></textarea>
                    </div>
                    {{-- @dd($configuration) --}}
                    <div class="components-selection">
                        <h2>Выберите компоненты</h2>
                        @foreach ($componentList as $key => $value)
                            <div class="component-category">
                                <div class="category-header">
                                    <i class="{{ $value['i'] }}"></i>
                                    <h3>{{ $value['title'] }}</h3>
                                    <span class="status">
                                        @if (isset($value['selectedComponent']))
                                            @if ($key === 'motherboards')
                                                {{ $value['selectedComponent']->vendor->title }}
                                                {{ $value['selectedComponent']->chipset->title }}
                                                {{ $value['selectedComponent']->title }}
                                            @else
                                                {{ $value['selectedComponent']->vendor->title }}
                                                {{ $value['selectedComponent']->title }}
                                            @endif
                                        @else
                                            Не выбрано
                                        @endif
                                    </span>
                                </div>
                                <a href="{{ route('catalog', ['componentTitle' => $key]) }}" type="button"
                                    class="btn btn-outline select-component">
                                    {{ $value['placeholder'] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if ($configurationErrors)
                        <!-- Внутри build-form, перед form-actions -->
                        <div class="compatibility-errors">
                            <h3><i class="fas fa-exclamation-triangle"></i> Проверка совместимости</h3>
                            <div class="errors-list">
                                @foreach ($configurationErrors as $key => $value)
                                    <div class="error-item">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $value }}</span>
                                    </div>
                                @endforeach
                                <!-- Статичные примеры ошибок -->

                            </div>
                        </div>
                    @else
                        <div class="compatibility-errors">
                            <h3><i class="fas fa-check-circle"></i> Проверка совместимости</h3>
                            <div class="errors-list">
                                <div class="no-errors">
                                    <i class="fas fa-check"></i>
                                    <span>Все компоненты совместимы</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus-circle"></i> Создать сборку
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
