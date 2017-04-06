<!DOCTYPE html>
<html>
<head>
<title>BBS系统</title>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="linear">
        <div id="white_rec">
            <div>
                <img id="logo_icon" src="file:///F:/Tp5/Learn_TP5/application/BBS/static/img/cc.jpg">
            </div>
        </div>
        <img src="file:///F:/Tp5/Learn_TP5/application/BBS/static/img/cc.jpg">
    </div>
    <div id="login">
        <form id="form1" name="form1" method="post" action="/login/loginpost/">
            <input type="hidden" name="redirect_url" value="" />
            <div id="namelayer">
                <span>用户名:</span>
                <input type="text" name="username" class="inputtext" placeholder="Username" maxlength="20" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
            </div>
            <div id="passwordlayer">
                <span>密&nbsp;&nbsp;码:</span>
                <input type="password" name="password" class="inputtext" placeholder="Password" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
            </div>
            <div id="submitlayer">
                <input type="submit" name="login" value=" 登 录 " class="login_submit" />
            </div>
        </form>
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