<?php

namespace App\Http\Middleware;

use App\Models\Section;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SectionTeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $teacher = Auth::guard('teacher')->user();

        // Check if this teacher exists in sections table
        $hasSection = Section::where('class_teacher_id', $teacher->id)->exists();

        if (!$hasSection) {
            return redirect()->back()->with('error', 'Access Denied! You are not assigned to any section.');
        }

        return $next($request);
    }
}
