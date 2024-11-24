<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Course;
use App\Models\Customer;

class CourseBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $customer;

    public function __construct(Course $course, User $customer)
    {
        $this->course = $course;
        $this->customer = $customer;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Course Booking Confirmation',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mails.customers.course.verification',
        );
    }
}
