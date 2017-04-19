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
</style>
</head>
<body>
	
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
