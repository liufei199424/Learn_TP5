<?php
	if (PATH_SEPARATOR == ':') {
		$path = "/home/fhw/tp5/Learn_TP5/application/bbs/view";
	} else {
		$path = "F:/Tp5/Learn_TP5/application/BBS/view";
	}
    include $path . "/_head.php";
?>
<table class="table table-bordered">
	<tbody>
		<tr class="warn">
			<td colspan="10">
				<span class="col-md-12" class="form-control" id="info">修改密码</span>
			</td>
		</tr>
		<tr class="info">
			<th width="80">用户名</th>
			<td>
				<span class="col-md-12" class="form-control">{$user->username}</span>
				<input type="hidden" name="userid" id="userid" value="{$user->id}"/>
			</td>
		</tr>
		<tr class="info">
			<th>
				原密码
			</th>
			<td>
				<input type="password" id="oldpassword" name="oldpassword"/>
			</td>
		</tr>
		<tr class="info">
			<th>
				新密码
			</th>
			<td>
				<input type="password" id="newpassword" name="newpassword"/>
			</td>
		</tr>
		<tr class="info">
			<td colspan="10">
				<input type="submit" class="btn btn-success" id="modifypassword_post" value="提交">
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	$(function(){
		$("#modifypassword_post").on('click', function(){
			var userid = $("#userid").val();
			var oldpassword = $("#oldpassword").val();
			var newpassword = $("#newpassword").val();

    		$.ajax({
    			"type" : "post",
    			"data" : {
					userid : userid,
					oldpassword : oldpassword,
					newpassword : newpassword
        		},
    			"dataType" : "html",
    			"url" : "/index.php/bbs/user_action/modifypasswordpost",
    			"success" : function (data) {
    				$("#info").html(data);
    			}	
			});
		});
	});
</script>
