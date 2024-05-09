<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable=[
      'name',
      'is_free',
      'content',
      'video',
      'status'
    ];

    protected $casts = [
        'video' => 'array',
    ];

    public function users() :belongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function course() :belongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('status',1);
    }
}
