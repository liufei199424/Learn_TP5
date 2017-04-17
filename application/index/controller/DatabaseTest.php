<?php

namespace app\index\controller;
use think\Controller;
use think\Db;

use	app\index\model\Data;
use app\index\model\User;

class DatabaseTest {

    public function _empty () {
        echo "模块不存在或者路由错误！！！";
    }

    public function query () {
        $result_user = Db::table('user')->select();
        dump($result_user);

        $result_find = Db::table('think_data')->where('data','php')->select();
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

    public function insertdata () {
        echo "插入之前：";
        $result_select = Db::table('think_data')->select();
        dump($result_select);

        $data = [
            ['data' => '青龙'],
            ['data' => '白虎'],
            ['data' => '玄武']
        ];

        echo "插入之前：";
        Db::table('think_data')->insertAll($data);

        $result_select = Db::table('think_data')->select();
        dump($result_select);

        // $teachers = ['name' => '张起灵'];
        // Db::table('teacher')->insert($teachers);

        $teacherarr = Db::table('teacher')->where('name', '张起灵')->field('id')->find();
        echo $teacherarr['id'];

        // $students = [
        //     'name' => '吴邪'，
        //     'teacherid' => 13
        //     // ['name' => '潘子'， 'teacherid' => '12'],
        //     // ['name' => '王胖子'， 'teacherid' => '12'],
        //     // ['name' => '王盟'， 'teacherid' => '12']
        // ];
        // Db::table('student')->insert($students);
    }

    public function update () {
        Db::table('think_data')
			->where('id', 5)
			->update(['data' => '朱雀']);

        $result = Db::table('think_data')
            ->where('id',5)
            ->find();

        dump($result);
    }

    public function delete () {
        Db::table('think_data')
            ->where('id', 1)
            ->delete();
        $result_select = Db::table('think_data')->select();
        dump($result_select);

        Db::table('think_data')
            ->delete([2,3]);
        $result_select = Db::table('think_data')->select();
        dump($result_select);

        Db::table('think_data')
            ->where('id','<',5)
            ->delete();
        $result_select = Db::table('think_data')->select();
        dump($result_select);
    }

    public function queryMethod () {
        $result = Db::table('think_data')
            ->where('data', 'like', '%红莲%')
            ->select();
        dump($result);

        //	获取`think_user`表所有信息
        dump(Db::getTableInfo('think_data'));
        //	获取`think_data`表所有字段
        dump(Db::getTableInfo('think_data',	'fields'));
        //	获取`think_data`表所有字段的类型
        dump(Db::getTableInfo('think_data',	'type'));
        //	获取`think_data`表的主键
        dump(Db::getTableInfo('think_data',	'pk'));
    }

    public function sql () {
        $sql = "select *
            from think_data where id > 7";
        $result = Db::query($sql);
        dump($result);
    }

    public function modeltest () {
        $data = new Data;

        $data->data = "cc！！！";
        $data->save();

        $row = [
            'name' => 'fhw',
            'data' => '那是因为cc是个喜新厌旧的女人'
        ];

        $data2 = new Data;
        $data2->data($row);
        $data2->allowField(true)->save();

        // 批量新增
        $rows = [
            ['data' => 'cc是魔女'],
            ['data' => 'cc是人'],
            ['data' => 'cc是好人'],
        ];

        $data3 = new Data;
        $data3->saveAll($rows);

        //  静态方法
        $row = [
            'data' => 'cc呼呼'
        ];

        $data4 = Data::create($row);

        // 修改
        $data5 = Data::get(7);
        $data5->data = "cc人";
        $data5->save();

        echo $data5->data;

    }

    public function gettest () {
        $user = User::get(['username' => 'fhw']);
        dump($user);

        $datas = Data::get(['data' => 'cc是人']);
        echo $datas->id . " " . $datas->data . "<br>";

        $data = new Data;
        $datas = $data->where('data', 'like', '%cc%')->select();

        foreach ($datas as $data) {
            echo $data->id . " " . $data->data . "<br>";
        }

        $data = new Data;
        $datas = $data->where('data', 'like', '%cc%')->column('data');
        dump($datas);
    }

    // 事务
    public function transactiontest () {
        Db::startTrans();

        try{
            $data = Data::get(1);
            echo "{$data->id} {$data->data} \n";
            $data->data = "一剑光寒照九州 4";
            $data->save();

            $data2 = Data::get(123);
            $data2->delete();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }
    }
}
