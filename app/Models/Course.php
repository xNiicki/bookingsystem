<?php

// Course.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'startDate',
        'startTime',
        'dayName',
        'sessions'
    ];

    protected $casts = [
        'startDate' => 'date',
        'startTime' => 'datetime',
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
