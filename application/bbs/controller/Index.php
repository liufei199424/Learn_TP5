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

        $user = User::get(['username' => $username]);
        if ($user instanceof User && $user->password == $password) {
            Session::clear();
            
            Session::set('user',$user);
            
            $user->last_login_time = date('Y-m-d H:i:s');
            $user->save();
            
            $this->success('登陆成功','index/successlogin',3);
        } else {
            if ($user instanceof User) {
                $user->login_fail_cnt++;
                $user->save();
            }
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

    public function modifypassword () {
        $request = Request::instance();
        
        $userid = $request->param('userid',0);
        $errormsg = $request->param('errormsg','');

        $user = User::get($userid);
        
        $this->view->user = $user;
        $this->view->errormsg = $errormsg;
        
        return $this->fetch();
    }
    
    public function modifypasswordPost () {
        $request = Request::instance();
        
        $userid = $request->param('userid',0);
        $oldpassword = $request->param('oldpassword','');
        $newpassword = $request->param('newpassword','');
        
        $user = User::get($userid);
        if ($user->password != $oldpassword) {
            $this->redirect('index/modifypassword', ['userid' => $user->id, 'errormsg' => '原密码错误']);
        } else if ($oldpassword == $newpassword) {
            $this->redirect('index/modifypassword', ['userid' => $user->id, 'errormsg' => '新密码与原密码一样']);
        }
        $user->password = $newpassword;
        $user->save();
        
        Session::set('user', $user);
        
        return $this->redirect('index/successlogin');
    }

}