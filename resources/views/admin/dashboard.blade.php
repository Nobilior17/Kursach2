@extends('layouts.admin')

@section('title', 'Панель управления')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Панель управления</h2>
        <p>Добро пожаловать в админ-панель зачетки!</p>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card text-center p-3">
            <h3>{{ \App\Models\Subject::count() }}</h3>
            <p>Предметов</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3">
            <h3>{{ \App\Models\Schedule::count() }}</h3>
            <p>Экзаменов/Зачетов</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3">
            <h3>{{ \App\Models\User::where('role', 'student')->count() }}</h3>
            <p>Студентов</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3">
            <h3>{{ \App\Models\Result::count() }}</h3>
            <p>Оценок выставлено</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-info-circle"></i> Быстрые действия
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary w-100">
                            <i class="bi bi-plus-circle"></i> Добавить предмет
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.schedules.create') }}" class="btn btn-success w-100">
                            <i class="bi bi-calendar-plus"></i> Добавить экзамен
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.results.create') }}" class="btn btn-warning w-100">
                            <i class="bi bi-pencil"></i> Выставить оценку
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-eye"></i> В зачетку
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection