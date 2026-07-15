<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    // Поля, которые можно заполнять массово
    protected $fillable = [
        'user_id',
        'schedule_id',
        'status',
        'grade',
    ];

    // Связь: результат принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь: результат принадлежит расписанию
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}