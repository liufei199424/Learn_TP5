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
					<th width="200">标题</th>
					<th width="180">创建时间</th>
					<th width="60">模块</th>
					<th width="100">作者</th>
					<th width="400">描述</th>
					<th width="60">回复</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($list as $post) {
					?>
						<tr class="info">
							<td>
								<a class="showpost" data-postid="<?= $post->id ?>" href="#">{$post->title}</a>
							</td>
							<td>{$post->createtime}</td>
							<td>{$post->module->title}</td>
							<td>{$post->user->username}</td>
							<td>{$post->content}</td>
							<td>{$post->reply_cnt}</td>
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
		$(".showpost").on('click', function(){
			var me = $(this);

			var postid = me.data("postid");
			
			$.ajax({
				"type" : "post",
				"data" : {
					postid : postid
				},
				"dataType" : "html",
				"url" : "/index.php/bbs/post_action/showoneposthtml",
				"success" : function(data) {
					$("#showmodulehtml").html(data);
				}
			});
		});
		
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
