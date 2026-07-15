@extends('layouts.admin')

@section('title', isset($subject) ? 'Редактировать предмет' : 'Добавить предмет')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{ isset($subject) ? 'Редактировать предмет' : 'Новый предмет' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($subject) ? route('admin.subjects.update', $subject) : route('admin.subjects.store') }}" method="POST">
            @csrf
            @if(isset($subject)) @method('PUT') @endif
            
            <div class="mb-3">
                <label for="name" class="form-label">Название предмета</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $subject->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="teacher" class="form-label">Преподаватель</label>
                <input type="text" class="form-control @error('teacher') is-invalid @enderror" 
                       id="teacher" name="teacher" value="{{ old('teacher', $subject->teacher ?? '') }}" required>
                @error('teacher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
</div>
@endsection