@extends('layouts.admin')

@section('title', 'Оценки')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Оценки студентов</h2>
    <a href="{{ route('admin.results.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Добавить оценку
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Студент</th>
                    <th>Группа</th>
                    <th>Предмет</th>
                    <th>Тип</th>
                    <th>Статус</th>
                    <th>Оценка</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->user->name }}</td>
                    <td>{{ $result->user->group ?? '—' }}</td>
                    <td>{{ $result->schedule->subject->name }}</td>
                    <td>
                        <span class="badge bg-{{ $result->schedule->type == 'exam' ? 'primary' : 'info' }}">
                            {{ $result->schedule->type == 'exam' ? 'Экзамен' : 'Зачет' }}
                        </span>
                    </td>
                    <td>
                        @php
                            $statusMap = [
                                'passed' => ['text' => '✅ Сдано', 'class' => 'success'],
                                'not_passed' => ['text' => '❌ Не сдано', 'class' => 'danger'],
                                'failed' => ['text' => '⚠️ Долг', 'class' => 'warning'],
                            ];
                            $status = $statusMap[$result->status] ?? ['text' => $result->status, 'class' => 'secondary'];
                        @endphp
                        <span class="badge bg-{{ $status['class'] }} badge-status">
                            {{ $status['text'] }}
                        </span>
                    </td>
                    <td><strong>{{ $result->grade ?? '—' }}</strong></td>
                    <td>
                        <a href="{{ route('admin.results.edit', $result) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.results.destroy', $result) }}" method="POST" class="d-inline">
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