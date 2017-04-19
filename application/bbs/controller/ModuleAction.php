<?php

namespace app\bbs\controller;

use think\Controller;
use think\Session;
use think\Request;
use app\bbs\model\Module;
use app\bbs\dao\Dao;
use app\bbs\common\PageLink;

class ModuleAction extends Controller {
    
    public function _initialize () {
        $user = Session::get('user');
        $this->view->user = $user;
    }
    
    public function list () {
        $request = Request::instance();

        $pagenum = $request->param('pagenum', 1);
        $pagesize = $request->param('pagesize', 3);
        $site = $request->param('site', '');

        $cond = "";
        $bind = [];
        $modules = Dao::getListEntityByCond4Page(new Module(), $pagenum, $pagesize, $cond, $bind);

        $cntsql = "select count(*) from module where 1 = 1 " . $cond;
        $cnt = Dao::queryValue($cntsql, $bind);
        $url = "/index.php/bbs/module_action/list";
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
        
        $this->redirect('module_action/list');
    }
}