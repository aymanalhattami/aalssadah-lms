<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Exam extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'status'
    ];
    /**
     * Get the course associated with the exam.
     */
    public function course() :BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the questions associated with the exam.
     */
    public function questions() :HasMany
    {
        return $this->hasMany(Question::class);
    }
}
