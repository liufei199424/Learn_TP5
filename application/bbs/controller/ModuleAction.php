<?php

namespace app\bbs\controller;

use think\Controller;
use think\Session;
use think\Request;
use app\bbs\model\Module;
use app\bbs\dao\Dao;
use app\bbs\common\PageLink;
use app\bbs\model\Post;

class ModuleAction extends Controller {

    public function _initialize () {
        $user = Session::get('user');
        $this->view->user = $user;
        
        $request = Request::instance();
        
        $title = $request->param('title', '');
        $this->view->title = $title;
    }

    public function mlist () {
        $request = Request::instance();

        $pagenum = $request->param('pagenum', 1);
        $pagesize = $request->param('pagesize', 10);
        $site = $request->param('site', '');
        
        $cond = "";
        $bind = [];
        
        $cond .= " order by createtime desc ";
        
        $modules = Dao::getListEntityByCond4Page(new Module(), $pagenum, $pagesize, $cond, $bind);

        $cntsql = "select count(*) from module where 1 = 1 " . $cond;
        $cnt = Dao::queryValue($cntsql, $bind);
        $url = "/index.php/bbs/module_action/mlist";
        $pagelink = PageLink::create($cnt, $pagenum, $pagesize, $url);

        $this->view->list = $modules;
        $this->view->pagelink = $pagelink;
        $this->view->pagenum = $pagenum;
        $this->view->site = $site;

        return $this->fetch();
    }

    public function add () {
        return $this->fetch();
    }

    public function addpost () {
        $request = Request::instance();

        $title = $request->param('title', '');
        $content = $request->param('content', '');

        $row = [];
        $row['title'] = $title;
        $row['content'] = $content;

        $module = Module::createByBiz($row);

        $this->redirect('module_action/mlist');
    }
    
    public function postlist () {
        $request = Request::instance();

        $pagenum = $request->param('pagenum', 1);
        $pagesize = $request->param('pagesize', 10);
        $site = $request->param('site', 'min');
        
        $word = $request->param('word', '');
        $moduleid = $request->param('moduleid', 0);
        
        $cond = "";
        $bind = [];
        
        if ($word) {
            $cond = " and title like :word ";
            $bind['word'] = "%{$word}%"; 
        } else {
            if ($moduleid) {
                $cond = " and moduleid = :moduleid ";
                $bind['moduleid'] = $moduleid;
            }
        }
        
        $cond .= " order by reply_cnt desc ";
        
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
