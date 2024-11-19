<?php

// Course.php
namespace App\Models;

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
        'capacity'
    ];

    protected $casts = [
        'startDate' => 'date',
        'startTime' => 'datetime',
    ];

    /**
     * Get the customers for the course.
     */
    public function customers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'course_customer')
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

