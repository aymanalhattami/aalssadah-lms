<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseAccessMiddleware
{
    public $data=[];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $courses=Course::where('id',$request->route('id'))->with('lessons:is_free,name,course_id')->get();
//dd($courses);
        foreach ($courses as $course)
        {
//            echo $course;
            foreach ($course->lessons as $lesson)
            {
                if ($lesson->is_free)
                {
                    echo $lesson->name.' - '. str_replace(['1','0'],['Free','Paid'],$lesson->is_free);
                }
            }
//            dd(  $course->lessons);
        }
        dd(
            'a'
        );
//        return $next($request);
    }
}
