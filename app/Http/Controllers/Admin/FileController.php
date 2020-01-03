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
        $data = [];
        return view('admin.file.index', $data);
    }

    //上传表单
    public function up(Request $request, File $fileModel){
        $data = [];
        return view('admin.file.up', $data);
    }

    //上传保存
    public function save(Request $request, File $fileModel){
    }
}
