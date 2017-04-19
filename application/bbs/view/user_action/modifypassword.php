<form action="/index.php/bbs/user_action/modifypasswordpost" method="post">
	<table class="table table-bordered">
		<tbody>
			<tr class="warn">
				<td colspan="10">
					<?php
						$info = '';
						if ($errormsg) {
							$info = $errormsg;
						} else {
							$info = "修改密码";
						}
					?>
					<span class="col-md-12" lass="form-control">{$info}</span>
				</td>
			</tr>
			<tr class="success">
				<th width="80">用户名</th>
				<td>
					<span class="col-md-12" lass="form-control">{$user->username}</span>
					<input type="hidden"name="userid" value="{$user->id}"/>
				</td>
			</tr>
			<tr class="success">
				<th>
					原密码
				</th>
				<td>
					<input type="password" name="oldpassword"/>
				</td>
			</tr>
			<tr class="success">
				<th>
					新密码
				</th>
				<td>
					<input type="password" name="newpassword"/>
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
