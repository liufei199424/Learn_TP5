<?php
	if (PATH_SEPARATOR == ':') {
		$path = "/home/fhw/tp5/Learn_TP5/application/bbs/view";
	} else {
		$path = "F:/Tp5/Learn_TP5/application/BBS/view";
	}
    include $path . "/_head.php";
?>
<style>
    .divbackgroud {
    	background-color: #eee;
        padding: 10px 19px;
		font-size: 16px;
        line-height: 28px;
        word-wrap: break-word;
        text-align: justify;
    	zoom: 1;
		margin-bottom: 10px;
    }
</style>
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
					<td width="100">回帖人</td>
					<td>内容</td>
				</tr>
				<?php
 					foreach ($floors as $a) {
 					?>
						<tr>
							<th width="100">{$a->user->username}</th>
							<td>
								<div class="divbackgroud" style="background-color: #ebf1f7">
									{$a->content}
								</div>
								<div>
									<?php
									   foreach ($replys[$a->id] as $reply) {
									   ?>
									   		<div class="divbackgroud">
												<span style="font-size: 13px;">
    									   			{$reply->createtime} <span style="">{$reply->fromuser->username}</span> 回复@{$reply->touser->username}
												</span> <br>
    									   		{$reply->content}
									   		</div>
									   <?php
									   }
									?>
								</div>
								<div>
									<button class="btn btn-success reply_reply" data-floorid="{$a->id}" data-userid="{$a->user->id}" data-username="{$a->user->username}">回复</button>
								</div>
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
		<div id="hide">
			<input type="hidden" id="floorid">
			<input type="hidden" id="fromuserid">
			<input type="hidden" id="touserid">
		</div>
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
					<th>回复 给 <span id="replyor">楼主({$post->user->username})</span></th>
					<td>
						<textarea id="content" rows="6" cols="70"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="10">
						<a href="#" data-postid="<?= $post->id ?>" class="btn btn-success" id="replyreply">回复</a>
						<a href="#" data-postid="<?= $post->id ?>" data-userid="<?= $user->id ?>" class="btn btn-success" id="replyfloor">回复</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	function init () {
		$("#replyreply").hide();
	}
	$(function(){
		init();

		$(".page").on('click', function(){
			var href = $(this).attr('href');
			var list = href.split('/');
			var postid = {$post->id};

			$.ajax({
				"type" : "post",
				"data" : {
					pagenum : list[2],
					site : list[4],
					postid : postid
				},
				"dataType" : "html",
				"url" : "/index.php/bbs/post_action/showoneposthtml",
				"success" : function(data) {
					$("#showmodulehtml").html(data);
				}
			});
		});

		$(".reply_reply").on('click', function(){
			$("#replyreply").show();
			$("#replyfloor").hide();

			var me = $(this);

			var fromuserid = {$user->id};
			var touserid = me.data("userid");
			var floorid = me.data("floorid");
			var tousername = me.data("username");

			$("#floorid").val(floorid);
			$("#fromuserid").val(fromuserid);
			$("#touserid").val(touserid);

			$("#replyor").html(tousername);
		});

		$("#replyreply").on('click', function(){
			var me = $(this);

			var floorid = $("#floorid").val();
			var fromuserid = $("#fromuserid").val();
			var touserid = $("#touserid").val();
			var content = $("#content").val();

			var postid = me.data("postid");

			if (content == '') {
				alert("回复内容不能为空");
				return false;
			} else {
    			$.ajax({
    				"type" : "post",
    				"data" : {
    					floorid : floorid,
    					fromuserid : fromuserid,
    					touserid : touserid,
    					content : content,
    					postid : postid
    				},
    				"dataType" : "html",
    				"url" : "/index.php/bbs/post_action/replyreplypost",
    				"success" : function(data){
    					if (data == 'success') {
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
    					}
    				}
    			});
			}
		});

		$("#replyfloor").on('click', function(){
			var me = $(this);

			var postid = me.data("postid");
			var userid = me.data("userid");
			var content = $("#content").val();

			if (content == '') {
				alert("回复内容不能为空");
				return false;
			} else {
    			$.ajax({
    				"type" : "post",
    				"data" : {
    					postid : postid,
    					userid : userid,
    					content : content
    				},
    				"dataType" : "html",
    				"url" : "/index.php/bbs/post_action/replyfloorpost",
    				"success" : function(data){
    					if (data == 'success') {
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
    					}
    				}
    			});
			}
		});
	});
</script>
