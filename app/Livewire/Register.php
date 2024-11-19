<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Customer;
use Livewire\Component;

class Register extends Component
{
    public $courseId;
    public $course;

    // Form Properties
    public $name;
    public $email;
    public $phone;

    // Mount method to handle the route parameter
    public function mount($id)
    {
        $this->courseId = $id;
        $this->course = Course::findOrFail($id);
    }

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|min:10'
    ];

    public function register()
    {
        $this->validate();

        // Create new customer
        $customer = Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        // Attach course to customer
        $customer->courses()->attach($this->courseId);

        // Send email notification
        // Mail::to($this->email)->send(new CourseRegistrationMail($this->course, $customer));

        session()->flash('message', 'Successfully registered for the course!');
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.register', [
            'course' => $this->course
        ]);
    }
}
