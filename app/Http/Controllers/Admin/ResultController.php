<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['user', 'schedule.subject'])->orderBy('created_at', 'desc')->get();
        return view('admin.results.index', compact('results'));
    }

    public function create()
    {
        $students = User::where('role', 'student')->get();
        $schedules = Schedule::with('subject')->where('is_active', true)->get();
        return view('admin.results.create', compact('students', 'schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
            'status' => 'required|in:passed,not_passed,failed',
            'grade' => 'nullable|integer|min:2|max:5',
        ]);

        // Проверяем, нет ли уже результата
        $existing = Result::where('user_id', $request->user_id)
                         ->where('schedule_id', $request->schedule_id)
                         ->first();

        if ($existing) {
            return back()->with('error', 'У этого студента уже есть оценка за этот экзамен');
        }

        Result::create($request->all());
        return redirect()->route('admin.results.index')->with('success', 'Оценка добавлена');
    }

    public function edit(Result $result)
    {
        $students = User::where('role', 'student')->get();
        $schedules = Schedule::with('subject')->where('is_active', true)->get();
        return view('admin.results.edit', compact('result', 'students', 'schedules'));
    }

    public function update(Request $request, Result $result)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
            'status' => 'required|in:passed,not_passed,failed',
            'grade' => 'nullable|integer|min:2|max:5',
        ]);

        $result->update($request->all());
        return redirect()->route('admin.results.index')->with('success', 'Оценка обновлена');
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('admin.results.index')->with('success', 'Оценка удалена');
    }
}