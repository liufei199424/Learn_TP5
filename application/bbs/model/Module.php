<?php

namespace	app\bbs\model;
use	think\Model;

class Module extends Model {
    //自定义初始化
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }
    
    //	设置当前模型对应的完整数据表名称
    protected $table = 'module';
    
    public static function createByBiz (array $row) {
        $default = [];
    
        
    
        $row += $default;
    
        $module = new Module();
        $module->data($row);
        $module->save();
    
        return $module;
    }
    
    public function getTableName () {
        return $this->table;
    }
}