<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterWrite;
use App\Http\Requests\CourseWrite;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\File;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //课程列表
    public function index(Request $request, Course $course){
        $courses = $course->orderBy('sort','asc')->get();
        $data = [
            'courses'   => $courses
        ];
        return view('admin.course.index', $data);
    }

    //课程详细
    public function detail(Request $request, Course $course){
        $data = [
            'course'    => $course,
        ];
        return view('admin.course.detail', $data);
    }

    //课程添加、编辑
    public function add(Request $request, Course $course){
        $data = [
            'course'    => $course,
        ];
        return view('admin.course.add', $data);
    }

    //课程保存
    public function save(CourseWrite $request, Course $course, File $fileModel){
        $data = $request->validated();
        $data['image'] = '';

        //检查是否上传了有效的文件
        if($request->hasFile('image') && $request->file('image')->isValid() ){
            $file = $request->file('image');
            //检查文件是否为图像
            if( !in_array( $file->extension(), config('project.upload.image') ) ){
                alert('不被允许的文件类型', 'danger');
                return redirect()->back();                
            }
            //将图像保存到指定位置，并获取其相对路径到 $data 数组
            $data['image']  = $file->store('course','public');
            //将图像写入到files数据表，作为记录。
            $fileModel->saveFile( 'course_image', $data['image'], $file );
        }
        
        if( $course->id ){
            $course->update( $data );
        }else{
            $course->create( $data );
        }
        
        alert('操作成功');
        return redirect()->route('admin.course');
    }

    //课程移除
    public function remove(Request $request, Course $course){

        if( $course->chapter()->count() > 0 ){
            alert('删除失败，请先删除旗下章节','danger');
            return back();
        }

        $course->delete();
        alert('操作成功');
        return back();
    }

    //章节添加、编辑
    public function chapterAdd(Request $request, Course $course, Chapter $chapter){
        $data = [
            'course'    => $course,
            'chapter'    => $chapter,
        ];
        return view('admin.course.chapter_add', $data);
    }

    //章节保存
    public function chapterSave(ChapterWrite $request, Course $course, Chapter $chapter){
        $data = $request->validated();
        $data['course_id']  = $course->id;

        if( $chapter->id ){
            $chapter = $chapter->update( $data );
        }else{
            $chapter = $chapter->create( $data );
        }
        
        alert('操作成功');
        return redirect()->route('admin.course.detail', [$course->id]);
    }

    //章节移除
    public function chapterRemove(Request $request,Course $course, Chapter $chapter){
        
        //要检查是否包含资源，如果有则禁止删除
        if( $chapter->resource()->count() > 0 ){
            alert('删除失败，请先删除旗下资源','danger');
            return back();
        }

        $chapter->delete();
        alert('操作成功');
        return redirect()->route('admin.course.detail', [$course->id]);
    }

    //资源关联
    public function resourceAdd(Request $request, Course $course, Chapter $chapter){
        $data = [
            'course'    => $course,
            'chapter'    => $chapter,
        ];
        return view('admin.course.resource_add', $data);
    }

    //资源保存
    public function resourceSave(Request $request, Course $course, Chapter $chapter){
        $resource_ids = $request->input('resource_id');
        $sort = $request->input('sort');
        
        $post = [];
        foreach($resource_ids as $key => $resource_id){

            //资源id或排序id留空，表示删除该关联
            if(!$resource_id || !$sort[$key]){
                continue;
            }

            $post[ $resource_id ] = [
                'sort'  => $sort[ $key ],
            ];  
        }

        $chapter->resource()->sync($post);

        alert('操作成功');
        return redirect()->route('admin.course.resource.add', [$course->id, $chapter->id]);


    }
}
