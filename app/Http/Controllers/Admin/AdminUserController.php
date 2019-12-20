<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //列表
    public function index(){
        return view('admin.adminuser.index');
    }

    //添加+编辑
    public function add(){
        
    }

    //保存
    public function save(){
        
    }

    //移除
    public function remove(){
        
    }

    //状态切换
    public function state(){
        
    }
}
