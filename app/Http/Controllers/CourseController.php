<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use function response;
use function view;

class CourseController extends Controller
{
    public $data=[];

    public function index()
    {
        $courses=Course::select('id','name','thumbnail')->active()->get();

        return view('courses.index',compact('courses'));
    }

    public function show($id,Request $request)
    {
        $course=Course::where('id',$id)->with('lessons')->first();

        foreach ($course->lessons as $lesson)
        {
            $this->data[]=$lesson->name;

        }

        return view('courses.id', with($this->data));
    }
}
