<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column centerdiv">
			<form class="form-horizontal" role="form" action="/index.php/bbs/index/modifypasswordPost" method="post">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
					<div class="col-sm-2">
						<span class="form-control">{$user->username}</span>
						<input type="hidden" name="userid" class="form-control" id="inputEmail3" value="{$user->id}"/>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">原密码</label>
					<div class="col-sm-2">
						<input type="password" name="oldpassword" class="form-control" id="inputPassword3" />
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
					<div class="col-sm-2">
						<input type="password" name="newpassword" class="form-control" id="inputPassword4" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">修改</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

