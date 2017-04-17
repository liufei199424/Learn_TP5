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
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>id</th>
							<th>用户名</th>
							<th>最后一次登录时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($list as $user) {
							?>
								<tr class="info">
									<td>{$user->id}</td>
									<td>{$user->username}</td>
									<td>{$user->last_login_time}</td>
									<td>
										<a href="#">修改</a>
										<a href="#">删除</a>
									</td>
								</tr>
							<?php
							}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script>
</script>
</html>
