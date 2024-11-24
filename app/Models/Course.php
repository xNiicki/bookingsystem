<?php

// Course.php
namespace App\Models;

use App\Filters\CourseFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Course.php
class Course extends Model
{
    protected $fillable = [
        'name',
        'startDate',
        'startTime',
        'dayName',
        'sessions',
        'capacity',
        'price',  // Add this line
        'description'  // Add this if it's not already there
    ];


    // casts property
    protected $casts = [
        'startDate' => 'date',
        'startTime' => 'datetime',
        'price' => 'decimal:2',
    ];

    /**
     * Get the customers for the course.
     */
    public function customers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_customer')
            ->withTimestamps();
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class);
    }

    /**
     * Get the trainers for the course.
     */
    public function trainers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_trainer')
            ->withTimestamps();
    }

    /**
     * Check if course is fully booked
     */
    public function isFullyBooked(): bool
    {
        return $this->customers()->count() >= $this->capacity;
    }

    /**
     * Get available spots
     */
    public function getAvailableSpotsAttribute(): int
    {
        return $this->capacity - $this->customers()->count();
    }
}

