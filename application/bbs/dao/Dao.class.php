<?php
namespace app\bbs\dao;
use think\Db;
use app\bbs\model\User;

class Dao {

    public static function getEntityByCond ($entityClassName, $cond, $bind) {
        $tablename = $entityClassName::getTableName();
        
        $sql = "select id from :table where 1 = 1 " . $cond . " limit 1 ";
        $arr = [];
        $arr[':table'] = $tablename;
        
        $arr += $bind;
        
        $userid = Db::query($sql, $arr);
        
        return User::get($userid[0]['id']);
    }
}