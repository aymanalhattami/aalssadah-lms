<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseAccessMiddleware
{
    public $name=[];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $courses=Course::where('id',$request->route('id'))->with('lessons:is_free,name,course_id')->get();
        foreach ($courses as $course)
        {
            foreach ($course->lessons as $lesson)
            {
                if ($lesson->is_free)
                {
                    return $next($request);
                }
            }
        }
        return \response()->json([
            'Response'=>
                [
                    'Lesson_name'=>'there is no free lessons in this course',
                ]
        ],403);

    }
}
