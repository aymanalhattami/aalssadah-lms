<?php

namespace App\Http\Controllers;

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
        $lessons=Lesson::select('name','is_free','content','video','status')->active()->get();

        return view('lessons.index',compact('lessons'));
    }

    public function show($id,Request $request)
    {
            return Lesson::where('id',$id)->first();
    }
}
