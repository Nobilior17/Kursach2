<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectsSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create(['name' => 'Математика', 'teacher' => 'Иванова М.И.']);
        Subject::create(['name' => 'Информатика', 'teacher' => 'Петров С.А.']);
        Subject::create(['name' => 'Физика', 'teacher' => 'Сидоров В.Н.']);
        Subject::create(['name' => 'Русский язык', 'teacher' => 'Козлова Е.П.']);
        Subject::create(['name' => 'История', 'teacher' => 'Морозов А.В.']);
    }
}