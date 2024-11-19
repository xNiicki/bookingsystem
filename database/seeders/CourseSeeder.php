<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    private array $courseNames = [
        'Yoga Basics',
        'Advanced Yoga',
        'Pilates',
        'Tai Chi',
        'Kickboxing'
    ];

    private array $days = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ];

    public function run(): void
    {
        // Clear existing courses
        Course::truncate();

        // Generate 10 courses
        for ($i = 0; $i < 10; $i++) {
            Course::create([
                'name' => $this->courseNames[array_rand($this->courseNames)],
                'startDate' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d'),
                'startTime' => sprintf('%02d:%02d:00', rand(8, 20), rand(0, 59)),
                'dayName' => $this->days[array_rand($this->days)],
                'sessions' => rand(4, 12)
            ]);
        }
    }
}
