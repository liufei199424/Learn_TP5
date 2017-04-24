<?php

namespace app\bbs\controller;

use think\Controller;
use think\Session;
use app\bbs\dao\Dao;
use app\bbs\model\Module;
use think\Request;
use app\bbs\model\Post;
use app\bbs\model\Floor;
use app\bbs\model\Reply;
use app\bbs\common\PageLink;

class PostAction extends Controller {

    public function _initialize () {
        $user = Session::get('user');
        $this->view->user = $user;

        $request = Request::instance();
        
        $title = $request->param('title', '');
        $this->view->title = $title;
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
        $pagesize = $request->param('pagesize', 5);
        $site = $request->param('site', '');

        $postid = $request->param('postid', 0);
        $post = Post::get($postid);

        $cond = " and postid = :postid order by createtime asc";
        $bind = [];
        $bind['postid'] = $postid;

        $floors = Dao::getListEntityByCond4Page(new Floor(), $pagenum, $pagesize, $cond, $bind);

        $cntsql = "select count(*) from floor where 1 = 1 " . $cond;
        $cnt = Dao::queryValue($cntsql, $bind);
        $url = "#";
        $pagelink = PageLink::create($cnt, $pagenum, $pagesize, $url);

        $replys = [];
        foreach ($floors as $a) {
            $replys[$a->id] = Dao::getListEntityByCond(new Reply(), " and floorid = :floorid order by createtime asc ", ['floorid' => $a->id]);
        }

        $this->view->post = $post;
        $this->view->floors = $floors;
        $this->view->replys = $replys;
        $this->view->pagelink = $pagelink;
        $this->view->pagenum = $pagenum;
        $this->view->site = $site;

        return $this->fetch();
    }

    // 回帖给贴主
    public function replyfloorpost () {
        $request = Request::instance();

        $postid = $request->param('postid', 0);
        $userid = $request->param('userid', 0);
        $content = $request->param('content', '');

        $row = [];
        $row['postid'] = $postid;
        $row['userid'] = $userid;
        $row['content'] = $content;

        $floor = Floor::createByBiz($row);
        
        $post = Post::get($postid);
        $post->reply_cnt ++;
        $post->save();

        return "success";
    }

    // 回复给楼主
    public function replyreplypost () {
        $request = Request::instance();

        $floorid = $request->param('floorid', 0);
        $fromuserid = $request->param('fromuserid', 0);
        $touserid = $request->param('touserid', 0);
        $content = $request->param('content', '');
        
        $postid = $request->param('postid', 0);

        $row = [];
        $row['floorid'] = $floorid;
        $row['fromuserid'] = $fromuserid;
        $row['touserid'] = $touserid;
        $row['content'] = $content;

        $reply = Reply::createByBiz($row);
        
        $post = Post::get($postid);
        $post->reply_cnt ++;
        $post->save();

        return "success";
    }
}
