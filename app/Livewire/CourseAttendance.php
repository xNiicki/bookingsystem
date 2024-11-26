<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Customer;
use App\Models\CourseAttendance as CourseAttendanceModel;

class CourseAttendance extends Component
{
    public $course;
    public $attendanceRecords = [];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->loadAttendanceRecords();
    }

    public function loadAttendanceRecords()
    {
        $customers = $this->course->customers;

        foreach ($customers as $customer) {
            for ($session = 1; $session <= $this->course->sessions; $session++) {
                try {
                    $record = CourseAttendanceModel::firstOrCreate(
                        [
                            'course_id' => $this->course->id,
                            'customer_id' => $customer->id,
                            'session_number' => $session,
                        ],
                        ['attended' => false]
                    );

                    $this->attendanceRecords[$customer->id][$session] = $record->attended;
                } catch (\Illuminate\Database\QueryException $e) {
                    // Log the error or handle it appropriately
                    \Log::error("Foreign key violation: Course ID {$this->course->id} or Customer ID {$customer->id} does not exist.");
                }
            }
        }
    }

    public function toggleAttendance($customerId, $session)
    {
        $record = CourseAttendanceModel::where([
            'course_id' => $this->course->id,
            'customer_id' => $customerId,
            'session_number' => $session,
        ])->first();

        $record->attended = !$record->attended;
        $record->save();

        $this->attendanceRecords[$customerId][$session] = $record->attended;
    }

    public function render()
    {
        return view('livewire.course-attendance');
    }
}
