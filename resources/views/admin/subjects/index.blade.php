@extends('layouts.admin')

@section('title', 'Предметы')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Предметы</h2>
    <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Добавить предмет
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Преподаватель</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $subject->name }}</strong></td>
                    <td>{{ $subject->teacher }}</td>
                    <td>
                        <a href="{{ route('admin.subjects.edit', $subject) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST" class="d-inline">
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