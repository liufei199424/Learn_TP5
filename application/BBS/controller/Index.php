<?php
namespace app\BBS\controller;
use think\Controller;
use think\Request;
use think\Session;

class Index extends Controller {
    
    public function index () {
        return $this->fetch();
    }
    
    public function login () {
        $request = Request::instance();
        
        $username = $request->param('username', '');
        $password = $request->param('password', '');
        
        if ($username == 'fanghanwen' && $password == 'liufei') {
            Session::set('username',$username);
            
            $this->success('登陆成功','index/successlogin',3);
        }
    }
    
    public function successlogin () {
        
        $username = Session::get('username');
        
        $this->view->username = $username;
        
        return $this->fetch();
    }
    
    public function faillogin () {
        echo "登陆失败";
    }
    
}