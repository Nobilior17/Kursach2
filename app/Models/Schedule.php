<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // Поля, которые можно заполнять массово
    protected $fillable = [
        'subject_id',
        'date',
        'time',
        'type',
        'audience',
    ];

    // Связь: расписание принадлежит предмету
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Связь: у расписания может быть много результатов
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}