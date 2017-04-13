<!DOCTYPE html>
<html>
<head>
<title>BBS系统</title>
<meta name="viewport"
	content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if (PATH_SEPARATOR == ':') {
		$path = "/home/fhw/tp5/Learn_TP5/application/bbs/view";
	} else {
		$path = "F:/Tp5/Learn_TP5/application/BBS/view";
	}
    include $path . "/_head.php";
?>
<style type="text/css">
.centerdiv {
 	position: absolute;
	left: 20%;
	top: 35%;
	border: solid 0px #ccc;
}
</style>
</head>
<body>
	<div class="container">
    	<div class="row clearfix">
    		<div class="col-md-12 column">
    			<nav class="navbar navbar-default" role="navigation">
    				<div class="navbar-header">
    					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">BBS系统</a>
    				</div>
    
    				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    					<ul class="nav navbar-nav">
    					</ul>
    					<form class="navbar-form navbar-left" role="search">
    						<div class="form-group">
    							<input type="text" class="form-control" />
    						</div> <button type="submit" class="btn btn-default">搜索</button>
    					</form>
    					<ul class="nav navbar-nav navbar-right">
    						<li>
    							 <a href="#">{$user->username}</a>
    						</li>
                            <li>
    							 <a href="/index.php/bbs/index/quit">退出登陆</a>
    						</li>
    						<li>
    							 <a href="/index.php/bbs/index/modifypassword?userid={$user->id}">设置</a>
    						</li>
    					</ul>
    				</div>
    			</nav>
    		</div>
    	</div>
    </div>
    <?php
		if ($errormsg != '') {
		?>
			<div class="container">
				<div class="row clearfix">
					<div class="col-md-12 column">
						<div class="alert alert-dismissable alert-warning">
							 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>
								警告
							</h4> <strong>{$errormsg}!</strong>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
	?>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column centerdiv">
				<form class="form-horizontal" role="form" action="/index.php/bbs/index/modifypasswordPost" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
						<div class="col-sm-2">
							<span class="form-control">{$user->username}</span>
							<input type="hidden" name="userid" class="form-control" id="inputEmail3" value="{$user->id}"/>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">原密码</label>
						<div class="col-sm-2">
							<input type="password" name="oldpassword" class="form-control" id="inputPassword3" />
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
						<div class="col-sm-2">
							<input type="password" name="newpassword" class="form-control" id="inputPassword4" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">修改</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script>
	
</script>
</html>
