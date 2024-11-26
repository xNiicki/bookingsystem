<?php

namespace App\Livewire\Admin;

use App\Mail\AdminMailRegistered;
use App\Models\Course;
use App\Models\Filter;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;

class AddCourses extends Component
{
    use WithFileUploads;


    // Form Properties
    public $name;
    public $startDate;
    public $startTime;
    public $endTime;
    public $sessions;
    public $capacity;
    public $price;
    public $description;
    public $trainer;
    public $filter;
    public $picture;
    public array $selectedFilter = [];
    protected $listeners = ['filterCreated' => 'refreshFilters'];




    // Validation Rules
    protected $rules = [
        'name' => 'required|min:3|max:255',
        'startDate' => 'required|date|after_or_equal:today',
        'startTime' => 'required',
        'endTime' => 'required|after:startTime',
        'sessions' => 'required|integer|min:1',
        'capacity' => 'required|integer|min:1', // Add this
        'picture' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required',

    ];

    // Custom Validation Messages
    protected $messages = [
        'startDate.after_or_equal' => 'The start date must be today or a future date.',
        'endTime.after' => 'The end must be after the start time. ',
    ];

    public function submit()
    {
        $this->validate();

        try {
            // uplaod image
            $imageName = now() . '.' . $this->picture->extension();
            $imagePath = $this->picture->store('storage', 'public');

            // Create new course
            $course = Course::create([
                'name' => $this->name,
                'startDate' => $this->startDate,
                'startTime' => $this->startTime,
                'endTime' => $this->endTime,
                'sessions' => $this->sessions,
                'capacity' => $this->capacity,
                'price' => $this->price,
                'description' => $this->description,
                'picture' => $imagePath
            ]);

            $course_trainer = $course->trainers()->attach($this->trainer);

            foreach ($this->selectedFilter as $item) {
                $course_filter = $course->filters()->attach($item);
            }

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

    public function handleFilterUpdate($value)
    {
        if ($value) {
            if (!in_array($value, $this->selectedFilter)) {
                $this->selectedFilter[] = $value;
            } else {
                $this->selectedFilter = array_diff($this->selectedFilter, [$value]);
            }
            $this->reset('filter');
        }
    }

    public function updatedFilter($value)
    {
        $this->handleFilterUpdate($value);
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function mount()
    {
        $this->selectedFilter = [];



        // Set default values if needed
        $this->startDate = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.admin.add-courses', [
            'trainers' => User::where('type', 'admin')->get(['id', 'name']),
            'filters' => Filter::all(['id', 'type'])
        ])->layout('components.layouts.admin');
    }
}
