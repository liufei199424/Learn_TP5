<!DOCTYPE html>
<html>
<head>
<title>BBS系统</title>
<meta name="viewport"
	content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"
	href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script
	src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
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
			<div class="col-md-12 column centerdiv">
				<form class="form-horizontal" role="form" action="/index.php/bbs/index/login" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
						<div class="col-sm-2">
							<input type="text" name="username" class="form-control" id="inputEmail3" />
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">密&nbsp;码</label>
						<div class="col-sm-2">
							<input type="password" name="password" class="form-control" id="inputPassword3" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label><input type="checkbox" />记住密码</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">登陆</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="submit" class="btn btn-default">注册</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$(".inputtext").on("mousemove", function(){
			var me = $(this);
			me.addClass('borderbule');
		});
		$(".inputtext").on("mouseleave", function(){
			var me = $(this);
			me.removeClass('borderbule');
		});
	});
</script>
</html>