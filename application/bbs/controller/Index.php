<?php
namespace app\bbs\controller;
use think\Controller;
use think\Request;
use think\Session;
use app\bbs\model\User;

class Index extends Controller {

    public function index () {
        $request = Request::instance();
        
        $errormsg = $request->param('errormsg', '');
        
        $this->view->errormsg = $errormsg;
        
        return $this->fetch();
    }

    public function login () {
        $request = Request::instance();

        $username = $request->param('username', '');
        $password = $request->param('password', '');

        $user = User::get(['username' => $username, 'password' => $password]);
        
        if ($user instanceof User) {
            Session::set('user',$user);

            $this->success('登陆成功','index/successlogin',3);
        } else {
            $this->redirect('index/index', ['errormsg' => '用户名或密码错误']);
        }
    }
    
    public function quit () {
        $this->redirect('index/index');
    }

    public function register () {
        $request = Request::instance();
        
        $errormsg = $request->param('errormsg', '');
        
        $this->view->errormsg = $errormsg;
        
        return $this->fetch();
    }

    public function registerpost () {
        $request = Request::instance();

        $username = $request->param('username', '');
        $password = $request->param('password', '');
        $affirmpassword = $request->param('affirmpassword', '');

        $user = User::get(['username' => $username]);
        if ($user instanceof User) {
            $this->redirect('index/register', ['errormsg' => '用户名重复']);
        }

        if ($password != $affirmpassword) {
            $this->redirect('index/register', ['errormsg' => '密码不一致']);
        }

        $row = [
            'username' =>  $username,
            'password' => $password
        ];
        
        $user = User::createByBiz($row);

        Session::set('user', $user);

        return $this->redirect('index/successlogin');
    }

    public function successlogin () {
        $user = Session::get('user');

        $this->view->user = $user;

        return $this->fetch();
    }

    public function faillogin () {
        echo "登陆失败";
    }

}
