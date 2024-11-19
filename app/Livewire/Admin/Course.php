<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Course as CourseModel;

class Course extends Component
{
    public $courseId;
    public $course;
    public $customers;

    public function mount($id)
    {
        $this->courseId = $id;
        // Load course with its related customers
        $this->course = CourseModel::with('customers')->findOrFail($id);
        $this->customers = $this->course->customers;
    }

    public function render()
    {
        return view('livewire.admin.course', [
            'course' => $this->course,
            'customers' => $this->customers
        ])->layout('components.layouts.admin');
    }
}
