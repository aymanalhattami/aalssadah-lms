<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(QueryBuilder::for(User::class)
            ->AllowedFilters([
                'name','email',
                AllowedFilter::scope('active')
            ])->get()
            );
    }
}
