<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'key'   => 'webname',
            'value' => '1024编程实验室',
            'name'  => '网站名称',
            'comment'   => '设置网站名称，显示在所有相关位置',
            'sort'  => 1,
        ]);
        Setting::create([
            'sort'  => 2,
            'key'   => 'icp',
            'value'   => '123456',
            'name'  => '备案号',
            'comment'   => '请输入网站备案号，最终显示在网页底部'
        ]);
        Setting::create([
            'sort'  => 3,
            'key'   => 'page_resource',
            'value'   => '15',
            'name'  => '资源分页',
            'comment'   => '资源页，每页显示多少条数据'
        ]);
        Setting::create([
            'sort'  => 4,
            'key'   => 'ali_access',
            'value'   => 'LTAI4Fdw9tbgKQQ7tY7CmEXD',
            'name'  => '阿里_ACCESS',
            'comment'   => '视频点播时需要使用'
        ]);
        Setting::create([
            'sort'  => 5,
            'key'   => 'ali_secret',
            'value'   => 'gcruD9mnZ6NOcsZoNF2crApD56GyjG',
            'name'  => '阿里_SECRET',
            'comment'   => '视频点播时需要使用'
        ]);
        Setting::create([
            'sort'  => 6,
            'key'   => 'ali_region',
            'value'   => 'cn-shanghai',
            'name'  => '阿里_地区ID',
            'comment'   => '默认 cn-shanghai，无需修改'
        ]);
    }
}
