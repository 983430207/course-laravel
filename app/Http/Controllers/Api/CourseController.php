<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;

use App\Http\Resources\Course as AppCourse;
use App\Http\Resources\Resource;
use App\Models\Course;
use App\Models\Resource as AppResource;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //课程集合
    public function index(Course $course){
        $courses = $course->orderBy('sort','asc')->get();
        return AppCourse::collection($courses);
    }
    //课程信息
    public function course(Course $course){
        $course->load('chapter');
        return new AppCourse( $course );
    }
    //资源信息
    public function resource(Course $course, AppResource $resource){
        //预加载关联表，否则不会加载
        switch($resource->type){
            case AppResource::VIDEO:
                $resource->load('video');
            break;
            case AppResource::DOC:
                $resource->load('doc');
            break;
            
        }
        
        $course_ids = $resource->chapter()->get()->keyBy('course_id')->keys();
        if( $course_ids->search( $course->id ) === false ){
            apiErr('越权访问');
        }
        return new Resource($resource);
    }
}
