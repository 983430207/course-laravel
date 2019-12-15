<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gbook;
use App\Models\Msg;
use Illuminate\Http\Request;

class MsgController extends Controller
{
    //
    public function index(Msg $msg){
        $msgs = $msg->orderBy('id','desc')->paginate(1);
        
        $data = [
            'msgs'  => $msgs,
        ];
        return view('gbook', $data);
    }

    public function save( Gbook $request, Msg $msg){
        
        $postdata = $request->validated();

        $is = $msg->create($postdata);
        return redirect()->route('index');
    }
}
