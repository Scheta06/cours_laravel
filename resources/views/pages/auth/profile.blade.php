@extends('layouts.app')

@section('content')
    <main class="main profile-page">
        <div class="container">
            <div class="profile-card">
                <div class="profile-header">
                    <img src="https://via.placeholder.com/120" class="avatar">
                    <div class="user-info">
                        <h1 class="user-name">{{ $user->name }}</h1>
                        @if ($user->role === 'user')
                            <span class="user-role" id="userRoleBadge">
                                <i class="fas fa-user"></i> Пользователь
                            </span>
                        @else
                            <span class="user-role" id="userRoleBadge">
                                <i class="fas fa-user"></i> Администратор
                            </span>
                        @endif
                        <div class="user-stats">
                            <div class="stat-item">
                                <div class="stat-value">{{ $configurationCount }}</div>
                                <div class="stat-label">Сборок</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-actions">
                        <!-- Эта кнопка будет видна только админам -->
                        @if ($user->role === 'admin')
                            <a href="{{ route('adminPanelForm') }}" class="btn btn-primary admin-only" id="adminPanelBtn">
                                <i class="fas fa-user-cog"></i> Админ-панель
                            </a>
                        @endif
                        <a href="{{ route('changePasswordForm') }}">
                            <button class="btn btn-outline">
                                <i class="fas fa-cog"></i> Изменить пароль
                            </button>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline">
                                <i class="fas fa-sign-out"></i> Выйти из аккаунта
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="profile-card">
                <h2 class="section-title">
                    <i class="fas fa-info-circle"></i> Информация
                </h2>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <div class="info-value">{{ $user->email }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Дата регистрации</span>
                        <div class="info-value">{{ $user->created_at }}</div>
                    </div>
                </div>
            </div>

            <div class="profile-card">

                <h2 class="section-title">
                    <i class="fas fa-tools"></i> Последние сборки
                </h2>
                @if ($configurationCount === 0)
                    <!-- Здесь будет список сборок -->
                    <div class="empty-state">
                        <i class="fas fa-tools"></i>
                        <p>У вас пока нет сборок</p>
                        <a href="{{ route('index') }}" class="btn btn-primary">Создать сборку</a>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
