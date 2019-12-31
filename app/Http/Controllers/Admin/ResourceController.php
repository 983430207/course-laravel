<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    //
    public function index(Resource $resource, Request $request){
        
        $resource = $resource->with('adminUser');

        /**
         * search 搜索对象
         */
        $search = new \stdClass;
        $search->keyword = $request->input('keyword','');
        $search->adminuser_id = $request->input('adminuser_id','');

        $search->type = $request->input('type',null);

        if( $search->keyword ){
            $resource = $resource->where('title', 'like', "%{$search->keyword}%");
        }

        if( $search->adminuser_id ){
            $resource = $resource->where('adminuser_id', $search->adminuser_id);
        }

        if( $search->type ){
            $resource = $resource->whereIn('type', $search->type);
        }


        $resources = $resource->orderBy('id','desc')->paginate(setting("page_resource"));
        $data = [
            'resources' => $resources,
            'search'     => $search
        ];
        return view('admin.resource.index', $data);
    }

    //添加、编辑
    public function add(Request $request, Resource $resource){

        $type = $request->input('type', null);
        if(!$type){
            alert('请指定资源类型', 'danger');
            return redirect()->route('admin.resource');
        }

        $data = [
            'type'  => $type,
        ];
        return view('admin.resource.add', $data);
    }

    //保存资源
    public function save(Request $request, Resource $resource){

    }

    //软删除移除资源
    public function remove(Request $request, Resource $resource){

    }

    //上传图片
    public function up(Request $request){

    }
}
