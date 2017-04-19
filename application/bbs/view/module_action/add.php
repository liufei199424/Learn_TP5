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
	<div class="container">
    	<?php
    	   include $path . "/_title.php";
    	?>
	</div>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<form action="/index.php/bbs/module_action/addpost" method="post">
	    			<table class="table table-bordered">
	    				<tbody>
	    					<tr class="success">
	    						<th>title</th>
	    						<td>
	    							<input name="title">
	    						</td>
	    					</tr>
	    					<tr class="success">
	    						<th>
	    							content
	    						</th>
	    						<td>
	    							<textarea rows="5" cols="60" name="content"></textarea>
	    						</td>
	    					</tr>
	    					<tr class="success">
	    						<td colspan="10">
	    							<input type="submit" class="btn btn-success" value="提交">
	    						</td>
	    					</tr>
	    				</tbody>
	    			</table>
				</form>
			</div>
		</div>
	</div>
</body>
<script>
</script>
</html>
