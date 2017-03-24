<?php
namespace app\index\controller;
use think\Controller;
// use think\Db;

class Index extends Controller
{
    public function _initialize() {
        echo "我是初始化函数<br>";
    }

    public function index($name = 'thinkphp')
    {
        $this->assign('name', $name);
        return $this->fetch();
    }

    public function hello($name = 'thinkphp')
    {
        $this->assign('name', $name);
        return $this->fetch();
    }

    public function test()
    {
        return '这是一个测试方法!';
    }

    protected function hello2()
    {
        return '只是protected方法!';
    }

    private function hello3()
    {
        return '这是private方法!';
    }
}
