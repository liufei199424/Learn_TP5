<?php

namespace app\index\controller;
use think\Controller;
use think\Db;

class DatabaseTest {

    public function query () {
        $result_find = Db::table('think_data')->where('id',1)->find();
        $result_select = Db::table('think_data')->select();

        dump($result_find);
        dump($result_select);

        $resule_name = Db::table('think_data')->where('id',1)->value('data');
        $resule_names = Db::table('think_data')->column('data');
        dump($resule_name);
        dump($resule_names);

        $data	=	['data'	=>	'我是红莲之爱啊！！！'];
        Db::table('think_data')->insert($data);

        $result_select = Db::table('think_data')->select();
        dump($result_select);
    }

}
