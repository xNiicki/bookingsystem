<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = ['type', 'description'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
