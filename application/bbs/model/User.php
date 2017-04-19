<?php

namespace	app\bbs\model;
use	think\Model;

class User extends Model
{
	//自定义初始化
	protected function initialize()
	{
		//需要调用`Model`的`initialize`方法
		parent::initialize();
		//TODO:自定义的初始化
	}

    //	设置当前模型对应的完整数据表名称
	protected $table = 'user';

	public static function createByBiz (array $row) {
		$default = [];

		$default['createtime'] = date('Y-m-d H:i:s');
		$default['updatetime'] = date('Y-m-d H:i:s');
		$default['username'] = '';
		$default['mobile'] = '';
		$default['password'] = '';
		$default['login_fail_cnt'] = 0;
		$default['last_login_time'] = '0000-00-00 00:00:00';
		$default['last_modifypassword_time'] = '0000-00-00 00:00:00';

		$row += $default;

		$user = new User();
		$user->data($row);
		$user->save();

		return $user;
	}
	
	public function getTableName () {
	    return $this->table;
	}
}
