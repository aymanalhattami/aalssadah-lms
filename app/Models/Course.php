<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'thumbnail',
        'status'
    ];

    /**
     * Get the users associated with the course.
     */
    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the lessons associated with the course.
     */
    public function lessons() :HasMany
    {
        return $this->HasMany(Lesson::class);
    }

    /**
     * Get the certificate associated with the course.
     */
    public function certificate() :HasOne
    {
        return $this->hasOne(Certificate::class);
    }

    /**
     * Get the assignment associated with the course.
     */
    public function assignment() :HasOne
    {
        return $this->hasOne(Assignment::class);
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status',1);
    }
}
