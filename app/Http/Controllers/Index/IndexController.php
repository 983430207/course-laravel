<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //首页
    public function index(Course $course){
        $data = [
            'courses'   => $course->orderBy('sort','asc')->get(),
        ];

        return view('index.index', $data);
    }
}
