<?php

namespace App\Livewire;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{

    public function logout(\Illuminate\Http\Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->redirectRoute('Home');
    }
    public function render()
    {
        $now = Carbon::today()->format('Y-m-d');

        $courses = Course::query()
            ->where('startDate', '>', $now)
            ->orderBy('startDate')
            ->orderBy('startTime')
            ->get();

        return view('livewire.home', [
            'courses' => $courses
        ]);
    }
}
