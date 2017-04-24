<?php

namespace	app\bbs\model;
use	think\Model;

class Floor extends Model {    
    //自定义初始化
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }
    
    //	设置当前模型对应的完整数据表名称
    protected $table = 'floor';
    
    public static function createByBiz (array $row) {
        $default = [];
    
        $default['createtime'] = date('Y-m-d H:i:s');
		$default['updatetime'] = date('Y-m-d H:i:s');
		$default['postid'] = 0;
		$default['userid'] = 0;
		$default['content'] = '';
    
        $row += $default;
    
        $floor = new Floor();
        $floor->data($row);
        $floor->save();
    
        return $floor;
    }
    
    public function getTableName () {
        return $this->table;
    }
    
    public function post ()
    {
        return $this->hasOne('Post','id','postid');
    }
    
    public function User () {
        return $this->hasOne('User','id','userid');
    } 
}