<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['course_id','title','desc','sort'];
}
