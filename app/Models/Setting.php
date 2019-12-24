<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['key', 'value', 'name', 'comment', 'sort'];

    protected $kvs = null;

    public function kv(){
        if( $this->kvs === null ){
            $this->kvs = $this->orderBy('sort','asc')->get()->mapWithKeys(function($item){
                return [
                    $item['key']    => $item['value']
                ];
            });
        }
        return $this->kvs;
    }
}
