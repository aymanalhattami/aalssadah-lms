<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable,HasRoles, HasPanelShield,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Give Access into filament Panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    /**
     * Get the courses associated with the user.
     */
    public function courses() :BelongsToMany
    {
        return $this->BelongsToMany(Course::class);
    }

    /**
     * Get the lessons associated with the user.
     */
    public function lessons() :BelongsToMany
    {
        return $this->BelongsToMany(Lesson::class);
    }


    /**
     * Get the certificate associated with the user.
     */
    public function certificate() :HasOne
    {
        return $this->hasOne(Certificate::class);
    }

    /**
     * Get the Active user.
     */

    public function scopeActive(Builder $builder)
    {
       return $builder->where('status',1);
    }
}
