<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Certificate extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the certificate.
     */
    public function user() :HasOne
    {
        return $this->hasOne(User::class);
    }
}
