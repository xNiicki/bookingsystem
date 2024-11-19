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
            ->get();

        return view('livewire.home', [
            'courses' => $courses
        ]);
    }
}
