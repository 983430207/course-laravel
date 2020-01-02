<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //课程列表
    public function index(Request $request){
        $data = [];
        return view('admin.course.index', $data);
    }

    //课程详细
    public function detail(Request $request, Course $course){
        $data = [];
        return view('admin.course.detail', $data);
    }

    //课程添加、编辑
    public function add(Request $request, Course $course){
        $data = [];
        return view('admin.course.add', $data);
    }

    //课程保存
    public function save(CourseAdd $request, Course $course, File $fileModel){}

    //课程移除
    public function remove(Request $request, Course $course){}

    //章节添加、编辑
    public function chapterAdd(Request $request, Course $course, Chapter $chapter){
        $data = [];
        return view('admin.course.chapter_add', $data);
    }

    //章节保存
    public function chapterSave(ChapterAdd $request, Course $course, Chapter $chapter){}

    //章节移除
    public function chapterRemove(Request $request,Course $course, Chapter $chapter){}

    //资源关联
    public function resourceAdd(Request $request, Course $course, Chapter $chapter){
        $data = [];
        return view('admin.course.resource_add', $data);
    }

    //资源保存
    public function resourceSave(Request $request, Course $course, Chapter $chapter){}
}
