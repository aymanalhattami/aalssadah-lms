<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class LessonController extends Controller
{
    public function index()
    {
        return LessonResource::collection(QueryBuilder::for(Lesson::class)
            ->AllowedFilters(['name',
                'content',
                AllowedFilter::scope('active'),
            ])
            ->get()
            );
    }

    public function show($id,Request $request)
    {
            return Lesson::where('id',$id)->first();
    }
}
