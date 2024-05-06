<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Spatie\QueryBuilder\QueryBuilder;

class SettingController extends Controller
{
    public function index()
    {
        return SettingResource::collection(QueryBuilder::for( Setting::class)
            ->AllowedFilters([
                'vision','goal','site_name'
            ])
            );
    }
}
