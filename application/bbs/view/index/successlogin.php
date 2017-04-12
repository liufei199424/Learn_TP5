<!DOCTYPE html>
<html>
<head>
<title>BBS系统</title>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if (PATH_SEPARATOR == ':') {
		$path = "/home/fhw/tp5/Learn_TP5/application/bbs/view";
	} else {
		$path = "F:/Tp5/Learn_TP5/application/BBS/view";
	}
    include $path . "/_head.php";
?>
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
<!-- 						<li class="dropdown"> -->
<!-- 							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a> -->
<!-- 							<ul class="dropdown-menu"> -->
<!-- 								<li> -->
<!-- 									 <a href="#">Action</a> -->
<!-- 								</li> -->
<!-- 								<li> -->
<!-- 									 <a href="#">Another action</a> -->
<!-- 								</li> -->
<!-- 								<li> -->
<!-- 									 <a href="#">Something else here</a> -->
<!-- 								</li> -->
<!-- 								<li class="divider"> -->
<!-- 								</li> -->
<!-- 								<li> -->
<!-- 									 <a href="#">Separated link</a> -->
<!-- 								</li> -->
<!-- 								<li class="divider"> -->
<!-- 								</li> -->
<!-- 								<li> -->
<!-- 									 <a href="#">One more separated link</a> -->
<!-- 								</li> -->
<!-- 							</ul> -->
<!-- 						</li> -->
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
							 <a href="/bbs/index/quit">退出</a>
						</li>
						<li>
							 <a href="#">设置</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
</script>
</html>
