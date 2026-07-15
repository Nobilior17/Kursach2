<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Поля, которые можно заполнять массово
    protected $fillable = [
        'name',
        'teacher',
    ];

    // Связь: у предмета может быть много записей в расписании
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}