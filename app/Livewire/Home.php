<?php

namespace App\Livewire;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $now = Carbon::today()->format('Y-m-d');

        $courses = Course::query()
            ->whereRaw("datetime(startDate) > datetime(?)", [$now])
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


        return view('livewire.home', [
            'courses' => $courses
        ]);
    }
}
