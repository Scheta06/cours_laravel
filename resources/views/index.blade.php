@extends('layouts.app')

@section('content')
    <main class="main">
        <section class="build-creator">
            <div class="container">


                <form class="build-form" action="{{ route('configuration') }}">
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

                    <div class="components-selection">
                        <h2>Выберите компоненты</h2>

                        @foreach ($componentList as $key => $value)
                            <div class="component-category">
                                <div class="category-header">
                                    <i class="{{ $value['i'] }}"></i>
                                    <h3>{{ $value['title'] }}</h3>
                                    <span class="status">Не выбрано</span>
                                </div>
                                <a href="{{ route('catalog', ['componentTitle' => $key]) }}" type="button"
                                    class="btn btn-outline select-component">
                                    {{ $value['placeholder'] }}
                                </a>
                            </div>
                        @endforeach

                    </div>

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
