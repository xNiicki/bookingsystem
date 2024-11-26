<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseAttendance extends Model
{
    protected $table = 'course_attendance';

    protected $fillable = [
        'course_id',
        'customer_id',
        'session_number',
        'attended',
    ];

    public function course()
    {
        return $this->belongsTo( Course::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
