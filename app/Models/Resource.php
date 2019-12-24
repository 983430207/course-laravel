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
}
