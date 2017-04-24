<div class="row clearfix">
	<div class="col-md-12 column">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">BBS系统</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" id="word" value="" />
					</div> <a class="btn btn-default" id="search" href="#">搜索</a>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						 <a href="/index.php/bbs/index/successlogin/title/successlogin" class="title" id="title-successlogin">首页</a>
					</li>
					<?php
					   if ($user->username == '剑君十二恨') {
				       ?>
        					<li>
        						 <a href="/index.php/bbs/user_action/ulist/title/ulist" class="title" id="title-ulist">用户列表</a>
        					</li>
        					<li>
        						 <a href="/index.php/bbs/module_action/mlist/title/mlist" class="title" id="title-mlist">模块列表</a>
        					</li>
				       <?php
					   }
					?>
					<li>
						 <a href="/index.php/bbs/user_action/mysetting/title/mysetting" class="title" id="title-mysetting">设置</a>
					</li>
					<li>
						 <a href="#"><?= $user->username ?></a>
					</li>
                    <li>
						 <a href="/index.php/bbs/index/quit">退出登陆</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<script>
	$(function(){
		$("#search").on('click', function(){
			var word = $("#word").val();

			$.ajax({
				"type" : "post",
				"data" : {
					word : word
				},
				"dataType" : "html",
				"url" : "/index.php/bbs/module_action/postlist",
				"success" : function(data){
					$(".select").removeAttr('style');
					
					$("#showmodulehtml").html(data);
				}
			});
			
		});
	});
</script>