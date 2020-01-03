<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['course_id','title','desc','sort'];


    public function resource(){
        return $this->belongsToMany('App\Models\Resource', 'chapter_resources')
            ->orderBy('sort','asc')
            ->withPivot('sort')
            ->withTimestamps();
    }
}
