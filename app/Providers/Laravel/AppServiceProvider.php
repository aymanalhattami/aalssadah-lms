<?php

namespace App\Providers\Laravel;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

    }
}
