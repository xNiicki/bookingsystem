<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = ['Name', 'Description', 'Type'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
