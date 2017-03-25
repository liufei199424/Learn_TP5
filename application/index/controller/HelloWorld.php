<?php
namespace app\index\controller;
use think\Controller;

/**
 *
 * @author fhw
 * 如果控制器是驼峰，则访问的时候用hello_world/index
 */
class HelloWorld extends Controller
{
    public function _empty() {
        return "方法不存在，请重新输入!!!";
    }

    public function index ($name = 'World', $age = 20)
    {
        return "Hello,{$name}!!!我今年{$age}岁！";
    }
}
