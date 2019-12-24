<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //展示配置表单
    public function index(){
        $data = [];
        return view('admin.setting.index', $data);
    }
    
    //保存配置
    public function save(Request $request){

    }
}
