<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['adminuser_id','title','desc','sort','image'];

    /**
     * 获取课程的封面图片，如果没有，返回默认图
     *
     * @return void
     */
    public function getImageLinkAttribute(){
        if(empty($this->image)){
            return asset('static/images/course-default.jpg');
        }
        return asset("storage/".$this->image);
    }


    //一对多关联到章节表
    public function chapter()
    {
        return $this->hasMany('App\Models\Chapter')->orderBy('sort','asc');
    }
}
