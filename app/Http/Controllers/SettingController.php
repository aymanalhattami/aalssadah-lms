<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;
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
