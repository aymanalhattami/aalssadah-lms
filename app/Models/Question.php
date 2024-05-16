<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use function Termwind\renderUsing;

class Question extends Model
{
    use HasFactory;

    protected $fillable=[
        'question',
        'status'
    ];

    /**
     * Get the exam associated with the question.
     */
    public function exam() :BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Get the answers associated with the question.
     */
    public function answers() :HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
