<?php

namespace app\index\controller;
use think\Controller;
use think\Request;

class RequestTest {

    public function index () {
        $request	=	Request::instance();
        //	获取当前域名
        echo	'domain:	'	.	$request->domain()	.	'<br/>';
        //	获取当前入口文件
        echo	'file:	'	.	$request->baseFile()	.	'<br/>';
        //	获取当前URL地址	不含域名
        echo	'url:	'	.	$request->url()	.	'<br/>';
        //	获取包含域名的完整URL地址
        echo	'url	with	domain:	'	.	$request->url(true)	.	'<br/>';
        //	获取当前URL地址	不含QUERY_STRING
        echo	'url	without	query:	'	.	$request->baseUrl()	.	'<br/>';
        //	获取URL访问的ROOT地址
        echo	'root:'	.	$request->root()	.	'<br/>';
        //	获取URL访问的ROOT地址
        echo	'root	with	domain:	'	.	$request->root(true)	.	'<br/>';
        //	获取URL地址中的PATH_INFO信息
        echo	'pathinfo:	'	.	$request->pathinfo()	.	'<br/>';
        //	获取URL地址中的PATH_INFO信息	不含后缀
        echo	'pathinfo:	'	.	$request->path()	.	'<br/>';
        //	获取URL地址中的后缀信息
        echo	'ext:	'	.	$request->ext()	.	'<br/>';
    }

    public function requestInfo () {
        $request	=	Request::instance();
        echo	"当前模块名称是"	.	$request->module() . "<br>";
        echo	"当前控制器名称是"	.	$request->controller() . "<br>";
        echo	"当前操作名称是"	.	$request->action() . "<br>";
    }

    public function requestParam () {
        $request	=	Request::instance();
        echo	'请求方法:'	.	$request->method()	.	'<br/>';
        echo	'资源类型:'	.	$request->type()	.	'<br/>';
        echo	'访问地址:'	.	$request->ip()	.	'<br/>';
        echo	'是否AJax请求:'	.	var_export($request->isAjax(),	true)	.	'<br/>';
        echo	'请求参数:';
        dump($request->param()['name']);
        echo	'请求参数:仅包含name';
        dump($request->only(['name']));
        echo	'请求参数:排除name';
        dump($request->except(['name']));
    }

    public function routeInfo () {
        $request	=	Request::instance();
        echo	'路由信息:';
        dump($request->route());
        echo	'调度信息:';
        dump($request->dispatch());
    }

    public function setRequest () {
        $request	=	Request::instance();
        $request->root('index.php');
        $request->pathinfo('index/request_tst/index');

        echo $request->pathinfo();
    }

    public function param () {
        $request = Request::instance();

        //	获取当前请求的name变量
        echo "+++" . $request->param('name') . "<br>";
        echo "+++" . $request->param('name', 'liufei') . "<br>";

        //	获取当前请求的所有变量(经过过滤)
        dump($request->param());

        //	获取当前请求的所有变量(原始数据)
        dump($request->param(false));

        //	获取当前请求的所有变量(包含上传文件)
        // $request->param(true);
    }

    public function servier () {
        $request = Request::instance();

        dump($request->server());
    }

    public function session () {
        $request = Request::instance();

        dump($request->session());
    }

    public function cookies () {
        $request = Request::instance();

        dump($request->cookie());
    }

    public function requestType () {
        //	是否为	GET	请求
        if	(Request::instance()->isGet())	echo	"当前为	GET	请求";
        //	是否为	POST	请求
        if	(Request::instance()->isPost())	echo	"当前为	POST	请求";
        //	是否为	PUT	请求
        if	(Request::instance()->isPut())	echo	"当前为	PUT	请求";
        //	是否为	DELETE	请求
        if	(Request::instance()->isDelete())	echo	"当前为	DELETE	请求";
        //	是否为	Ajax	请求
        if	(Request::instance()->isAjax())	echo	"当前为	Ajax	请求";
        //	是否为	Pjax	请求
        if	(Request::instance()->isPjax())	echo	"当前为	Pjax	请求";
        //	是否为手机访问
        if	(Request::instance()->isMobile())	echo	"当前为手机访问";
        //	是否为	HEAD	请求
        if	(Request::instance()->isHead())	echo	"当前为	HEAD	请求";
        //	是否为	Patch	请求
        if	(Request::instance()->isPatch())	echo	"当前为	PATCH	请求";
        //	是否为	OPTIONS	请求
        if	(Request::instance()->isOptions())	echo	"当前为	OPTIONS	请求";
        //	是否为	cli
        if	(Request::instance()->isCli())	echo	"当前为	cli";
        //	是否为	cgi
        if	(Request::instance()->isCgi())	echo	"当前为	cgi";
    }

}
