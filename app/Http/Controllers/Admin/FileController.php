<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Setting;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //展示配置表单
    public function index(File $fileModel){

        $data = [
            'files'  => $fileModel->orderBy('id','desc')->paginate(15)
        ];
        return view('admin.file.index', $data);
    }

    //上传表单
    public function up(Request $request, File $fileModel){
        $data = [];
        return view('admin.file.up', $data);
    }

    //上传保存
    public function save(Request $request, File $fileModel){
        if($request->hasFile('filename') && $request->file('filename')->isValid() ){

            $file = $request->file('filename');
            if( !in_array( $file->extension(), config('project.upload.files') ) ){
                alert('不被允许的文件类型', 'danger');
                return back();
            }    
            
            //保存文件到指定位置
            $filepath = $file->store('other','public');
            $fileModel->saveFile( 'other_upload', $filepath, $file );
            alert('上传成功');
            return redirect()->route('admin.file'); 
        }else{
            alert('上传失败','danger');
            return back();
        }
    }
}
