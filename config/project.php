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
    ]
];