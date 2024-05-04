<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CourseController extends Controller
{
    public $data=[];

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

    public function show($id,Request $request)
    {
        $course=Course::where('id',$id)->with('lessons')->get();

        foreach ($course as $lessons)
        {

           foreach ($lessons->lessons as $lesson)
           {
               $this->data[]=$lesson->name;
           }
        }
        if ($request->expectsJson()) {
            return response()->json($this->data);
        }

        /*
         * TODO
         * return this data to courses details View , So when End-User click on Course Name it opens them the name of lessons of this course
        */
        return view('users.index', with($this->data));
    }
}
