<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;

class Courses extends Component
{
    public function render()
    {

        if (auth()->user()->isAdmin()) {
            $courses = Course::query()
                ->orderBy('startDate')
                ->orderBy('startTime')
                ->get()
                ->map(function ($course) {
                    return [
                        'id' => $course->id,
                        'name' => $course->name,
                        'formattedDate' => Carbon::parse($course->startDate)->format('d.m.Y'),
                        'formattedTime' => Carbon::parse($course->startTime)->format('H:i'),
                        'dayName' => $course->dayName,
                        'sessions' => $course->sessions,
                    ];
                });
        } else {
            $courses = auth()->user()->courses()
                ->orderBy('startDate')
                ->orderBy('startTime')
                ->get()
                ->map(function ($course) {
                    return [
                        'id' => $course->id,
                        'name' => $course->name,
                        'formattedDate' => Carbon::parse($course->startDate)->format('d.m.Y'),
                        'formattedTime' => Carbon::parse($course->startTime)->format('H:i'),
                        'dayName' => $course->dayName,
                        'sessions' => $course->sessions,
                    ];
                });
        }


        return view('livewire.admin.courses', [
            'courses' => $courses
        ])->layout('components.layouts.admin');
    }
}
