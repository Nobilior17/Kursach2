@extends('layouts.admin')

@section('title', 'Добавить оценку')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Добавить оценку студенту</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.results.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="user_id" class="form-label">Студент</label>
                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                    <option value="">Выберите студента</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('user_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->name }} ({{ $student->group ?? 'без группы' }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="schedule_id" class="form-label">Экзамен/Зачет</label>
                <select class="form-control @error('schedule_id') is-invalid @enderror" id="schedule_id" name="schedule_id" required>
                    <option value="">Выберите</option>
                    @foreach($schedules as $schedule)
                        <option value="{{ $schedule->id }}" {{ old('schedule_id') == $schedule->id ? 'selected' : '' }}>
                            {{ $schedule->subject->name }} ({{ $schedule->type == 'exam' ? 'Экзамен' : 'Зачет' }}) - {{ $schedule->date }}
                        </option>
                    @endforeach
                </select>
                @error('schedule_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label">Статус</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="">Выберите статус</option>
                    <option value="passed" {{ old('status') == 'passed' ? 'selected' : '' }}>Сдано</option>
                    <option value="not_passed" {{ old('status') == 'not_passed' ? 'selected' : '' }}>Не сдано</option>
                    <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Долг</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="grade" class="form-label">Оценка (если экзамен)</label>
                <input type="number" class="form-control @error('grade') is-invalid @enderror" 
                       id="grade" name="grade" value="{{ old('grade') }}" min="2" max="5" placeholder="2-5">
                <small class="text-muted">Оставьте пустым для зачета</small>
                @error('grade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('admin.results.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
</div>
@endsection