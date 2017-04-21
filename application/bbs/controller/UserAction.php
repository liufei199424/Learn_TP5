<?php

namespace app\bbs\controller;

use think\Controller;
use think\Session;
use think\Request;
use app\bbs\model\User;
use app\bbs\model\Post;
use app\bbs\dao\Dao;
use app\bbs\common\PageLink;

class UserAction extends Controller {

    public function _initialize () {
        $user = Session::get('user');
        $this->view->user = $user;
    }

    public function test () {
        echo "为什么会报错";
    }

    public function ulist () {
        $request = Request::instance();

        $pagenum = $request->param('pagenum', 1);
        $pagesize = $request->param('pagesize', 10);
        $site = $request->param('site', '');
        
        $username = $request->param('username', '');
        
        $cond = "";
        $bind = [];
        
        if ($username) {
            $cond .= " and username like :username ";
            $bind['username'] = "%{$username}%";
        }

        $users = Dao::getListEntityByCond4Page(new User(), $pagenum, $pagesize, $cond, $bind);

        $cntsql = "select count(*) from user where 1 = 1 " . $cond;
        $cnt = Dao::queryValue($cntsql, $bind);
        $url = "/index.php/bbs/user_action/ulist";
        $pagelink = PageLink::create($cnt, $pagenum, $pagesize, $url);

        $this->view->list = $users;
        $this->view->pagelink = $pagelink;
        $this->view->pagenum = $pagenum;
        $this->view->site = $site;
        $this->view->username = $username;

        return $this->fetch();
    }

    public function mysetting () {
        return $this->fetch();
    }

    public function modifypassword () {
        $request = Request::instance();

        $userid = $request->param('userid', 0);
        $errormsg = $request->param('errormsg', '');

        $user = User::get($userid);

        $this->view->user = $user;
        $this->view->errormsg = $errormsg;

        return $this->fetch();
    }

    public function modifypasswordpost () {
        $request = Request::instance();

        $userid = $request->param('userid', 0);
        $oldpassword = $request->param('oldpassword', '');
        $newpassword = $request->param('newpassword', '');

        $user = User::get($userid);
        if ($user->password != $oldpassword) {
            return "原密码错误";
        } else {
            if ($newpassword == $oldpassword) {
                return "新密码与原密码一样";
            }
        }
        $user->password = $newpassword;
        $user->save();

        Session::set('user', $user);

        return "修改成功";
    }
    
    public function postlist () {
        $request = Request::instance();

        $pagenum = $request->param('pagenum', 1);
        $pagesize = $request->param('pagesize', 8);
        $site = $request->param('site', '');
        
        $cond = "";
        $bind = [];
        
        $user = Session::get('user');
        if ($user instanceof User) {
            $cond .= " and userid = :userid ";
            $bind['userid'] = $user->id;
        }

        $posts = Dao::getListEntityByCond4Page(new Post(), $pagenum, $pagesize, $cond, $bind);

        $cntsql = "select count(*) from post where 1 = 1 " . $cond;
        $cnt = Dao::queryValue($cntsql, $bind);
        $url = "#";
        $pagelink = PageLink::create($cnt, $pagenum, $pagesize, $url);

        $this->view->list = $posts;
        $this->view->pagelink = $pagelink;
        $this->view->pagenum = $pagenum;
        $this->view->site = $site;

        return $this->fetch();
    }
}
