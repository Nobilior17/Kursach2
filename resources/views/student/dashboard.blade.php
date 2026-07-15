<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Электронная зачетка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .container { margin-top: 30px; }
        .header { 
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .badge-status {
            font-size: 14px;
            padding: 6px 12px;
        }
        table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th { background: #e3f2fd; }
        .btn-admin {
            background: #ff6f00;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-admin:hover {
            background: #e65100;
            color: white;
            transform: scale(1.05);
        }
        .btn-admin i {
            margin-right: 8px;
        }
        .header-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: flex-end;
        }
        .badge-admin {
            background: rgba(255, 193, 7, 0.2);
            color: #ffd54f;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Шапка -->
        <div class="header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>📚 Электронная зачетная книжка</h1>
                    <p class="mb-0">ГБПОУ МО Люберецкий техникум имени Ю.А. Гагарина</p>
                </div>
                <div class="col-md-6">
                    <div class="header-actions">
                        <div class="text-end">
                            <h4>{{ Auth::user()->name }}</h4>
                            <p class="mb-0">Группа: <strong>{{ Auth::user()->group ?? '—' }}</strong></p>
                            <small>{{ Auth::user()->email }}</small>
                            @if(Auth::user()->is_admin)
                                <div class="mt-1">
                                    <span class="badge-admin">🔑 Администратор</span>
                                </div>
                            @endif
                        </div>
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="btn-admin">
                                <i class="bi bi-shield-lock"></i> Панель управления
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Таблица с расписанием -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Предмет</th>
                        <th>Преподаватель</th>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Тип</th>
                        <th>Аудитория</th>
                        <th>Статус</th>
                        <th>Оценка</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $index => $schedule)
                        @php
                            $result = $results[$schedule->id] ?? null;
                            $statusText = '—';
                            $statusClass = 'secondary';
                            $gradeText = '—';

                            if ($result) {
                                switch ($result->status) {
                                    case 'passed':
                                        $statusText = '✅ Сдано';
                                        $statusClass = 'success';
                                        break;
                                    case 'not_passed':
                                        $statusText = '❌ Не сдано';
                                        $statusClass = 'danger';
                                        break;
                                    case 'failed':
                                        $statusText = '⚠️ Долг';
                                        $statusClass = 'warning';
                                        break;
                                }
                                if ($result->grade) {
                                    $gradeText = $result->grade;
                                }
                            }
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $schedule->subject->name }}</strong></td>
                            <td>{{ $schedule->subject->teacher }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d.m.Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</td>
                            <td>
                                <span class="badge bg-{{ $schedule->type == 'exam' ? 'primary' : 'info' }}">
                                    {{ $schedule->type == 'exam' ? 'Экзамен' : 'Зачет' }}
                                </span>
                            </td>
                            <td>{{ $schedule->audience ?? '—' }}</td>
                            <td>
                                <span class="badge bg-{{ $statusClass }} badge-status">
                                    {{ $statusText }}
                                </span>
                            </td>
                            <td><strong>{{ $gradeText }}</strong></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-3">Нет расписания</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Кнопки выхода -->
        <div class="mt-4 d-flex gap-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger" type="submit">🚪 Выйти</button>
            </form>
        </div>
    </div>
</body>
</html>