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
							</h4> <strong>{$errormsg}</strong>
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
				<form class="form-horizontal" role="form" action="/index.php/bbs/index/registerpost" method="post">
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
						<label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
						<div class="col-sm-2">
							<input type="password" name="affirmpassword" class="form-control" id="inputPassword4" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
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
