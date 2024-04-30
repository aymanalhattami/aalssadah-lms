<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        return CourseResource::collection(QueryBuilder::for( Course::class)
            ->AllowedFilters(['name'])
            ->whereHas('lessons')
//            ->when(
//                $request->has('lessons')
//            )
            ->get()
            );
    }
}
