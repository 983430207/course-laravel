<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class File extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['adminuser_id','filetype', 'filepath','client_filename','fileext','filesize'];
    
    //获取器：文件地址
    function getFileLinkAttribute(){
        return asset("storage/".$this->filepath);
    }

    /**
     * 上传文件的插入数据库方法
     *
     * @param [type] $type
     * @param [type] $file_path
     * @param [type] $file
     * @return void
     */
    public function saveFile( $type, $file_path, $file ){
        //入库
        $data = [
            'adminuser_id'  => Auth::guard('admin')->id(),
            'filetype'  => $type,
            'filepath'  => $file_path,
            'client_filename'   => $file->getClientOriginalName(),
            'fileext'   => $file->extension(),
            'filesize'  => $file->getClientSize(),
        ];   
        
        return $this->create($data);        
    }
}
