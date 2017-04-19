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
						<input type="text" class="form-control" />
					</div> <button type="submit" class="btn btn-default">搜索</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						 <a href="/index.php/bbs/index/successlogin">首页</a>
					</li>
					<li>
						 <a href="#"><?= $user->username ?></a>
					</li>
					<?php 
					   if ($user->username == '剑君十二恨') {
				       ?>
        					<li>
        						 <a href="/index.php/bbs/user_action/list">用户列表</a>
        					</li>
        					<li>
        						 <a href="/index.php/bbs/module_action/list">模块列表</a>
        					</li>
				       <?php
					   }
					?>
                    <li>
						 <a href="/index.php/bbs/index/quit">退出登陆</a>
					</li>
					<li>
						 <a href="/index.php/bbs/user_action/mysetting">设置</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>