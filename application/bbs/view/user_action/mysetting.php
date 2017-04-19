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
    	<?php
    	   include $path . "/_title.php";
    	?>
    </div>
    <div class="container">
    	<div class="row clearfix">
    		<div class="col-md-2 column">
    			<div class="panel-group">
    				<div class="panel panel-default">
    					<div class="panel-heading select" data-type="password" data-userid="<?= $user->id ?>">
    						 <span class="panel-title collapsed">修改密码</span>
    					</div>
    				</div>
    				<div class="panel panel-default">
    					<div class="panel-heading select" data-type="post">
    						 <span class="panel-title collapsed">帖子</span>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-10 column">
    			<div id="showhtml">

    			</div>
    		</div>
    	</div>
    </div>
</body>
<script type="text/javascript">
	$(function(){
		$(".select").on('click', function(){
			$(".select").removeAttr('style');
			$(this).attr('style', 'background-color: #008DB9;color:#fff');

			var me = $(this);
			var type = me.data('type');
			if (type == 'password') {
				var userid = me.data("userid");
				$.ajax({
					"type" : "post",
					"data" : {
						userid : userid
					},
					"dataType" : "html",
					"url" : "/index.php/bbs/user_action/modifypassword",
					"success" : function(data) {
						$("#showhtml").html(data);
					}
				});
			}
		});
	});
</script>
</html>
