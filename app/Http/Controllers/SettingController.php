<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Spatie\QueryBuilder\QueryBuilder;

class SettingController extends Controller
{
    public function index()
    {
        $settings=Setting::select( 'site_name',
            'goal',
            'vision',
            'logo')->get();

        return view('settings',compact('settings'));
    }
}
