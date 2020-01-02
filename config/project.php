<?php

use App\Models\AdminUser;

return [
    'admin' => [
        'state' => [
            AdminUser::NORMAL   => '<span class="text-success">正常</span>',
            AdminUser::BAN   => '<span class="text-danger">禁用</span>',
        ]
    ],
    'resource'  => [
        'type'  => [
            App\Models\Resource::VIDEO  => '<span class="text-primary">视频</span>',
            App\Models\Resource::DOC  => '<span class="text-success">文档</span>',
        ]
    ],
    //上传限制
    'upload'    => [
        'type'  => [
            'doc_editor'=>'资源编辑器',
            'course_image'=>'课程头图',
            'other_upload'=>'独立上传',
        ],
        //图片上传的允许类型
        'image' => ['jpg','jpeg','png', 'gif'],
        
        //文件上传允许的类型
        'files' => ['jpg','jpeg','png', 'gif', 'zip', 'rar'],
    ]
];