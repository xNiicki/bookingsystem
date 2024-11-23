<?php

namespace App\Livewire\Admin;

use App\Mail\AdminMailRegistered;
use App\Models\Course;
use App\Models\Filter;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class AddCourses extends Component
{
    // Form Properties
    public $name;
    public $startDate;
    public $startTime;
    public $dayName;
    public $sessions;
    public $capacity;
    public $price;
    public $description;
    public $trainer;
    public $filter;


    // Validation Rules
    protected $rules = [
        'name' => 'required|min:3|max:255',
        'startDate' => 'required|date|after_or_equal:today',
        'startTime' => 'required',
        'dayName' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        'sessions' => 'required|integer|min:1',
        'capacity' => 'required|integer|min:1'  // Add this

    ];

    // Custom Validation Messages
    protected $messages = [
        'startDate.after_or_equal' => 'The start date must be today or a future date.',
        'dayName.in' => 'Please select a valid day of the week.'
    ];

    public function submit()
    {
        $this->validate();

        try {
            // Create new course
            $course = Course::create([
                'name' => $this->name,
                'startDate' => $this->startDate,
                'startTime' => $this->startTime,
                'dayName' => $this->dayName,
                'sessions' => $this->sessions,
                'capacity' => $this->capacity,
                'price' => $this->price,
                'description' => $this->description
            ]);

            $course_trainer = $course->trainers()->attach($this->trainer);

            $course_filter = $course->filters()->attach($this->filter);

            // Optional: Send email notification to admin
             Mail::to('developer@xniicki.de')->send(new AdminMailRegistered($course));

            // Reset form
            $this->reset();

            // Show success message
            session()->flash('message', 'Course created successfully!');

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating course. Please try again.');
            \Log::error('Course creation failed: ' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function mount()
    {
        // Set default values if needed
        $this->startDate = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.admin.add-courses', [
            'trainers' => User::all(['id', 'name']),
            'filters' => Filter::all(['id', 'type'])
        ])->layout('components.layouts.admin');
    }
}
