<?php
	if (PATH_SEPARATOR == ':') {
		$path = "/home/fhw/tp5/Learn_TP5/application/bbs/view";
	} else {
		$path = "F:/Tp5/Learn_TP5/application/BBS/view";
	}
    include $path . "/_head.php";
?>
<div>
	<div>
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div style="background-color: #ebf1f7;margin: 20px 0px;padding : 20px;border:1px solid #d0d9e3 ">
					<div class="page-header">
        				<h4>
        					标题：{$post->title} <br>
        					作者：<small>{$post->user->username}</small><br>
        					描述：<small>{$post->content}</small>
        				</h4>
        			</div>
				</div>
			</div>
		</div>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td width="100">{$post->user->username}</td>
					<td>
						{$post->title}
					</td>
				</tr>
				<?php
// 					foreach ($list as $post) {
// 					?>
						
					<?php
// 					}
// 				?>
				<tr>
					<td colspan="10">
						<?php
//         					include $path . "/_pagelink.php";
        				?>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th width="100">
						用户
					</th>
					<td>
						{$user->username}
					</td>
				</tr>
				<tr>
					<th>回复</th>
					<td>
						<textarea rows="6" cols="70"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="10">
						<input type="submit" class="btn btn-success" value="回复">
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
