<?php

namespace app\bbs\controller;

use think\Controller;
use think\Session;
use app\bbs\dao\Dao;
use app\bbs\model\Module;
use think\Request;
use app\bbs\model\Post;

class PostAction extends Controller {

    public function _initialize () {
        $user = Session::get('user');
        $this->view->user = $user;
    }

    public function add () {
        $modules = Dao::getListEntityByCond(new Module(), '', []);
        
        $this->view->modules = $modules;
        
        return $this->fetch();
    }
    
    public function addpost () {
        $request = Request::instance();
        
        $user = Session::get('user');
        $moduleid = $request->param('moduleid', 0);
        $title = $request->param('title', '');
        $content = $request->param('content', '');
        
        $row = [];
        $row['userid'] = $user->id;
        $row['moduleid'] = $moduleid;
        $row['title'] = $title;
        $row['content'] = $content;
        
        $post = Post::createByBiz($row);
        
        return "success";
    }
    
    public function showoneposthtml () {
        $request = Request::instance();
        
        $pagenum = $request->param('pagenum', 1);
        $pagesize = $request->param('pagesize', 10);
        $site = $request->param('site', '');
        
        $postid = $request->param('postid', 0);
        $post = Post::get($postid);
        
//         $this->view->pagelink = $pagelink;
        $this->view->pagenum = $pagenum;
        $this->view->site = $site;
        
        $this->view->post = $post;
        
        return $this->fetch();
    }
}
