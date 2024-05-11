<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Exam extends Model
{
    use HasFactory;

    /**
     * Get the assignment associated with the course.
     */
    public function course() :HasOne
    {
        return $this->hasOne(Course::class);
    }
}
