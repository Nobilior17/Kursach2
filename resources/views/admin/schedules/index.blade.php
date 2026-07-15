@extends('layouts.admin')

@section('title', 'Расписание')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Расписание экзаменов и зачетов</h2>
    <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Добавить
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Предмет</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Тип</th>
                    <th>Аудитория</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $schedule->subject->name }}</strong></td>
                    <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d.m.Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</td>
                    <td>
                        <span class="badge bg-{{ $schedule->type == 'exam' ? 'primary' : 'info' }}">
                            {{ $schedule->type == 'exam' ? 'Экзамен' : 'Зачет' }}
                        </span>
                    </td>
                    <td>{{ $schedule->audience ?? '—' }}</td>
                    <td>
                        <a href="{{ route('admin.schedules.edit', $schedule) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection