<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Администратор
        User::create([
            'name' => 'Администратор',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
            'group' => null,
            'is_admin' => true,
        ]);

        // 2. Студент 1
        User::create([
            'name' => 'Алейников Артём',
            'email' => 'student@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'student',
            'group' => 'ИС-24',
            'is_admin' => false,
        ]);

        // 3. Студент 2
        User::create([
            'name' => 'Астахов Денис',
            'email' => 'student2@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'student',
            'group' => 'ИС-24',
            'is_admin' => false,
        ]);

        // 4. Студент 3
        User::create([
            'name' => 'Ведяйкин Антон',
            'email' => 'student3@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'student',
            'group' => 'ИС-24',
            'is_admin' => false,
        ]);

        // 5. Студент 4
        User::create([
            'name' => 'Винокуров Даниил',
            'email' => 'student4@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'student',
            'group' => 'ИС-24',
            'is_admin' => false,
        ]);
    }
}