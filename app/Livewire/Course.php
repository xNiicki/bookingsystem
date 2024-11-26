<?php

namespace App\Livewire;

use App\Mail\CourseBookingConfirmation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Course as CourseModel;
use Psy\Util\Str;

class Course extends Component
{
    public $courseId;
    public $course;

    public $showModal;

    #[Url]
    public $currentPath = '';


    // Mount method to handle the route parameter
    public function mount($id)
    {
        $this->currentPath = request()->url();

        $this->courseId = $id;

        $this->course = CourseModel::findOrFail($id);
    }

    public function register()
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        $course = CourseModel::findOrFail($this->courseId);

        // Attach the user to the course
        $user->customerCourses()->attach($this->courseId);

        // Create attendance records for each session
        for ($session = 1; $session <= $course->sessions; $session++) {
            \App\Models\CourseAttendance::create([
                'course_id' => $this->courseId,
                'customer_id' => $userId,
                'session_number' => $session,
                'attended' => false // Default to not attended
            ]);
        }

        // Send confirmation email
        Mail::to($user->email)->send(new CourseBookingConfirmation($course, $user));

        session()->flash('message', 'Successfully registered for the course!');
        return redirect()->route('home');
    }

    public function redirectToLogin()
    {
        session()->flash('message', 'Please login to register for the course!');
        session()->put('url.intended', url()->previous());
        return redirect()->route('login');
    }

    public function redirectToRegister()
    {
        session()->flash('message', 'Please login to register for the course!');
        session()->put('url.intended', url()->previous());
        return redirect()->route('register');
    }


    public function showConfirmationModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function confirmRegistration()
    {
        // Perform the registration logic here
        $this->register();
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.course', [
            'id' => $this->courseId,
            'course' => $this->course
        ]);
    }
}
