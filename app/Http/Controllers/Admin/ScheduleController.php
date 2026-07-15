<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('subject')->orderBy('date')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.schedules.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'time' => 'required',
            'type' => 'required|in:exam,zachet',
            'audience' => 'nullable|string|max:255',
        ]);

        Schedule::create($request->all());
        return redirect()->route('admin.schedules.index')->with('success', 'Экзамен добавлен');
    }

    public function edit(Schedule $schedule)
    {
        $subjects = Subject::all();
        return view('admin.schedules.edit', compact('schedule', 'subjects'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'time' => 'required',
            'type' => 'required|in:exam,zachet',
            'audience' => 'nullable|string|max:255',
        ]);

        $schedule->update($request->all());
        return redirect()->route('admin.schedules.index')->with('success', 'Экзамен обновлен');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Экзамен удален');
    }
}