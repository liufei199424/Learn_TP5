<?php
namespace app\bbs\controller;
use think\Controller;
use think\Request;
use think\Session;
use app\bbs\model\User;

class Index extends Controller {

    public function index () {
        $this->view->errormsg = '';
        
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

    public function register () {
        return $this->fetch();
    }

    public function registerpost () {
        $request = Request::instance();

        $username = $request->param('username', '');
        $password = $request->param('password', '');
        $affirmpassword = $request->param('affirmpassword', '');

        $user = User::get(['username' => $username]);
        if ($user instanceof User) {
            echo '用户名重复';
        }

        if ($password != $affirmpassword) {
            echo '密码不一致';
        }

        $newuser = new User();
        $row = [
            'username' =>  $username,
            'password' => $password
        ];
        $newuser->data($row);
        $newuser->save();

        $username = Session::set('username', $username);

        return $this->redirect('index/successlogin');
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
