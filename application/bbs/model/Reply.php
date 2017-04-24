<?php

namespace	app\bbs\model;
use	think\Model;

class Reply extends Model {    
    //自定义初始化
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }
    
    //	设置当前模型对应的完整数据表名称
    protected $table = 'reply';
    
    public static function createByBiz (array $row) {
        $default = [];
    
        $default['createtime'] = date('Y-m-d H:i:s');
		$default['updatetime'] = date('Y-m-d H:i:s');
		$default['floorid'] = 0;
		$default['fromuserid'] = 0;
		$default['touserid'] = 0;
		$default['content'] = '';
    
        $row += $default;
    
        $reply = new Reply();
        $reply->data($row);
        $reply->save();
    
        return $reply;
    }
    
    public function getTableName () {
        return $this->table;
    }
    
    public function floor ()
    {
        return $this->hasOne('Floor','id','floorid');
    }
    
    public function fromuser () {
        return $this->hasOne('User','id','fromuserid');
    } 
    
    public function touser () {
        return $this->hasOne('User','id','touserid');
    }
}