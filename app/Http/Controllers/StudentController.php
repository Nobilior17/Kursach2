<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Все расписания (сортируем по дате)
        $schedules = Schedule::with('subject')->orderBy('date')->get();
        
        // Результаты текущего студента
        $results = Result::where('user_id', $user->id)->get()->keyBy('schedule_id');
        
        return view('student.dashboard', compact('schedules', 'results', 'user'));
    }
}