@extends('layouts.admin')

@section('title', 'Редактировать экзамен/зачет')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Редактировать экзамен/зачет</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="subject_id" class="form-label">Предмет</label>
                <select class="form-control @error('subject_id') is-invalid @enderror" 
                        id="subject_id" name="subject_id" required>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" 
                            {{ old('subject_id', $schedule->subject_id) == $subject->id ? 'selected' : '' }}>
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
                       id="date" name="date" value="{{ old('date', $schedule->date) }}" required>
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="time" class="form-label">Время</label>
                <input type="time" class="form-control @error('time') is-invalid @enderror" 
                       id="time" name="time" value="{{ old('time', $schedule->time) }}" required>
                @error('time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="type" class="form-label">Тип</label>
                <select class="form-control @error('type') is-invalid @enderror" 
                        id="type" name="type" required>
                    <option value="exam" {{ old('type', $schedule->type) == 'exam' ? 'selected' : '' }}>Экзамен</option>
                    <option value="zachet" {{ old('type', $schedule->type) == 'zachet' ? 'selected' : '' }}>Зачет</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="audience" class="form-label">Аудитория</label>
                <input type="text" class="form-control @error('audience') is-invalid @enderror" 
                       id="audience" name="audience" value="{{ old('audience', $schedule->audience) }}" 
                       placeholder="Например: 201">
                @error('audience')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Обновить</button>
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
</div>
@endsection