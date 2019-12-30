<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['adminuser_id', 'type', 'title', 'desc'];

    const VIDEO = 1;
    const DOC = 2;

    //资源类型获取器
    public function getTypeNameAttribute(){
        return config('project.resource.type')[$this->type];
    }

    //反向一对多关联到用户
    public function adminUser()
    {
        return $this->belongsTo('App\Models\AdminUser', 'adminuser_id');
    }
}
