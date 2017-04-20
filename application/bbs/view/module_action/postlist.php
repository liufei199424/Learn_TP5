<?php
	if (PATH_SEPARATOR == ':') {
		$path = "/home/fhw/tp5/Learn_TP5/application/bbs/view";
	} else {
		$path = "F:/Tp5/Learn_TP5/application/BBS/view";
	}
    include $path . "/_head.php";
?>
<div>
	<div >
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="40">id</th>
					<th width="60">模块</th>
					<th width="100">作者</th>
					<th width="200">标题</th>
					<th width="400">描述</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($list as $post) {
					?>
						<tr class="info">
							<td>{$post->id}</td>
							<td>{$post->module->title}</td>
							<td>{$post->user->username}</td>
							<td>{$post->title}</td>
							<td>{$post->content}</td>
							<td>
								<a href="#">修改</a>
								<a href="#">删除</a>
							</td>
						</tr>
					<?php
					}
				?>
				<tr>
					<td colspan="10">
						<?php
        					include $path . "/_pagelink.php";
        				?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$(".page").on('click', function(){
			var href = $(this).attr('href');
			var list = href.split('/');
			
			$.ajax({
				"type" : "post",
				"data" : {
					pagenum : list[2],
					site : list[4]
				},
				"dataType" : "html",
				"url" : "/index.php/bbs/module_action/postlist",
				"success" : function(data) {
					$("#showmodulehtml").html(data);
				}
			});
		});
	});
</script>
