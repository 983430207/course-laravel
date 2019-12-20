<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //列表
    public function index(AdminUser $adminuser){

        $adminusers = $adminuser->orderBy('id', 'desc')->get();
        $data = [
            'adminusers' => $adminusers,
        ];

        return view('admin.adminuser.index', $data);
    }

    //添加+编辑
    public function add(){
        
        $data = [];
        return view('admin.adminuser.add', $data);
    }

    //保存
    public function save(AdminUserRequest $request, AdminUser $adminuser){
        $data = $request->validated();
        $data['password'] = Hash::make( $data['password'] );
        $data['state'] = AdminUser::NORMAL;

        $is = $adminuser->create($data);
        
        alert('管理员操作成功');
        return redirect()->route('admin.adminuser');
    }

    //移除
    public function remove(){
        
    }

    //状态切换
    public function state(){
        
    }
}
