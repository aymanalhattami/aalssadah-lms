<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\Lesson;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {


        $lessonId = $request->route('id');
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            abort(404, 'Lesson not found');
        }


        if (!$lesson->is_free && !$request->user('sanctum')) {
//            return redirect()->route('login'); // Redirect to login if lesson requires authentication

            return \response()->json([
                'Message'=>'Lesson is Not Free, You should register First'
            ],'403');
        }

        return $next($request);
    }
}
