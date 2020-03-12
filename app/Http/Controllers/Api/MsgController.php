<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gbook;
use App\Http\Resources\Msg as AppMsg;
use App\Models\Msg;
use Illuminate\Http\Request;

class MsgController extends Controller
{
    //
    public function index(Msg $msg){
        return AppMsg::collection($msg->orderBy('id','desc')->paginate(3));
    }
    public function save(Gbook $r, Msg $msg){
        $postData = $r->validated();
        $item = $msg->create($postData);
        return ['code'=>0,'msg'=>'success', 'data'=>$item];
    }
}
