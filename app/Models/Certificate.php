<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'content',
        'issue_date',
        'certificate_link'
    ];

    /**
     * Get the user associated with the certificate.
     */
    public function course() :HasOne
    {
        return $this->hasOne(Course::class);
    }

}
