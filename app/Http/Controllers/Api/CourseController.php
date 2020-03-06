<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;

use App\Http\Resources\Course as AppCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index(Course $course){
        $courses = $course->orderBy('sort','asc')->get();
        return AppCourse::collection($courses);
    }
}
