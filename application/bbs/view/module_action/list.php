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
    		<div class="col-md-12 column" style="margin-bottom: 8px;">
    			 <a class="btn btn-default btn-success" href="/index.php/bbs/module_action/add">+ 新增模块</a>
    		</div>
			<div class="col-md-12 column">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>id</th>
							<th>标题</th>
							<th>备注</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($list as $module) {
							?>
								<tr class="info">
									<td>{$module->id}</td>
									<td>{$module->title}</td>
									<td>{$module->content}</td>
									<td>
										<a href="#">修改</a>
										<a href="#">删除</a>
									</td>
								</tr>
							<?php
							}
						?>
						<tr>
							<td colspan="4">
								<?php
                					include $path . "/_pagelink.php";
                				?>
							</td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</body>
<script>
</script>
</html>
