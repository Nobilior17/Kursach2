@extends('layouts.admin')

@section('title', 'Добавить экзамен/зачет')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Добавить экзамен/зачет</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.schedules.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="subject_id" class="form-label">Предмет</label>
                <select class="form-control @error('subject_id') is-invalid @enderror" 
                        id="subject_id" name="subject_id" required>
                    <option value="">Выберите предмет</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }} ({{ $subject->teacher }})
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="date" class="form-label">Дата</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" 
                       id="date" name="date" value="{{ old('date') }}" required>
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="time" class="form-label">Время</label>
                <input type="time" class="form-control @error('time') is-invalid @enderror" 
                       id="time" name="time" value="{{ old('time') }}" required>
                @error('time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="type" class="form-label">Тип</label>
                <select class="form-control @error('type') is-invalid @enderror" 
                        id="type" name="type" required>
                    <option value="">Выберите тип</option>
                    <option value="exam" {{ old('type') == 'exam' ? 'selected' : '' }}>Экзамен</option>
                    <option value="zachet" {{ old('type') == 'zachet' ? 'selected' : '' }}>Зачет</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="audience" class="form-label">Аудитория (необязательно)</label>
                <input type="text" class="form-control @error('audience') is-invalid @enderror" 
                       id="audience" name="audience" value="{{ old('audience') }}" 
                       placeholder="Например: 201">
                @error('audience')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
</div>
@endsection