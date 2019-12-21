<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use SoftDeletes;
    //
    protected $fillable = ['username', 'password', 'state'];
    const NORMAL = 1;   //正常，可登陆
    const BAN = 0;  //禁用，不可登陆

    //状态获取器
    public function getStateTextAttribute()
    {
        $config = config('project.admin.state');

        return $config[ $this->state ];
    }    
}
