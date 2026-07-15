<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #0d47a1, #1976d2);
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        .sidebar a.active {
            background: rgba(255,255,255,0.25);
            color: white;
        }
        .sidebar .nav-header {
            font-size: 12px;
            text-transform: uppercase;
            opacity: 0.6;
            margin-top: 20px;
            margin-bottom: 10px;
            padding: 0 15px;
        }
        .main-content {
            padding: 30px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .card-header {
            background: white;
            border-bottom: 2px solid #f0f2f5;
            font-weight: 600;
        }
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .badge-status {
            padding: 5px 12px;
            font-size: 12px;
        }
        .btn-back {
            background: rgba(255,255,255,0.15);
            color: white;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .btn-back:hover {
            background: rgba(255,255,255,0.25);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Боковое меню -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3">
                    <h4>📚 Админка</h4>
                    <small>ГБПОУ МО ЛТ</small>
                    <hr style="border-color: rgba(255,255,255,0.2);">
                </div>
                <nav>
                    <div class="nav-header">Управление</div>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Панель
                    </a>
                    <a href="{{ route('admin.subjects.index') }}" class="{{ request()->routeIs('admin.subjects.*') ? 'active' : '' }}">
                        <i class="bi bi-book"></i> Предметы
                    </a>
                    <a href="{{ route('admin.schedules.index') }}" class="{{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-event"></i> Расписание
                    </a>
                    <a href="{{ route('admin.results.index') }}" class="{{ request()->routeIs('admin.results.*') ? 'active' : '' }}">
                        <i class="bi bi-check-circle"></i> Оценки
                    </a>
                    
                    <div class="nav-header">Пользователи</div>
                    <a href="{{ route('admin.users') }}">
                        <i class="bi bi-people"></i> Студенты
                    </a>
                    
                    <hr style="border-color: rgba(255,255,255,0.2);">
                    
                    <!-- Кнопка перехода в зачетку -->
                    <a href="{{ route('dashboard') }}" class="btn-back" style="text-align: center; margin: 5px 15px; border-radius: 8px; padding: 10px;">
                        <i class="bi bi-eye"></i> В зачетку
                    </a>
                    
                    <hr style="border-color: rgba(255,255,255,0.2);">
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-white" style="text-decoration: none; display: block; width: 100%; text-align: left; padding: 10px 15px;">
                            <i class="bi bi-box-arrow-right"></i> Выйти
                        </button>
                    </form>
                </nav>
            </div>
            
            <!-- Контент -->
            <div class="col-md-10 main-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>