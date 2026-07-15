<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;
use App\Models\User;

class ResultsSeeder extends Seeder
{
    public function run(): void
    {
        // Находим первого студента
        $student = User::where('email', 'student@example.com')->first();

        if ($student) {
            // Для первого расписания (Математика) - сдано
            Result::create([
                'user_id' => $student->id,
                'schedule_id' => 1,
                'status' => 'passed',
                'grade' => 4
            ]);

            // Для второго расписания (Информатика) - не сдано
            Result::create([
                'user_id' => $student->id,
                'schedule_id' => 2,
                'status' => 'not_passed',
                'grade' => null
            ]);

            // Для третьего расписания (Физика) - долг
            Result::create([
                'user_id' => $student->id,
                'schedule_id' => 3,
                'status' => 'failed',
                'grade' => 2
            ]);
        }

        // Добавим результаты для второго студента
        $student2 = User::where('email', 'student2@example.com')->first();
        
        if ($student2) {
            Result::create([
                'user_id' => $student2->id,
                'schedule_id' => 1,
                'status' => 'passed',
                'grade' => 5
            ]);

            Result::create([
                'user_id' => $student2->id,
                'schedule_id' => 2,
                'status' => 'passed',
                'grade' => null
            ]);
        }
    }
}