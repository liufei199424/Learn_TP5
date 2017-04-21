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
		<tr class="success">
			<th>模块</th>
			<td>
				<div class="btn-group">
					<button class="btn btn-default" id="showselect">请选择...</button> 
					<input type="hidden" id="moduleid" value="">
					<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
						<span class="caret"></span>
					</button>
                    <ul class="dropdown-menu">
                    	<?php 
                    	   foreach ($modules as $a) {
                    	   ?>
                            	<li>
                            		 <a href="#" class="selecttype" data-moduleid="<?= $a->id ?>">{$a->title}</a>
                            	</li>
                    	   <?php    
                    	   }
                    	?>
                    </ul>
				</div>
			</td>
		</tr>
		<tr class="success">
			<th>title</th>
			<td>
				<input class="col-md-6" id="title_post" name="title">
			</td>
		</tr>
		<tr class="success">
			<th>
				content
			</th>
			<td>
				<textarea id="content_post" rows="5" cols="60" name="content"></textarea>
			</td>
		</tr>
		<tr class="success">
			<td colspan="10">
				<input type="submit" id="submitpost" class="btn btn-success" value="提交">
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	$(function(){
		$(".selecttype").on('click', function(){
			var me = $(this);
			var moduleid = me.data('moduleid');
			$("#moduleid").val(moduleid);

			var title = me.html();
			$("#showselect").html(title);
		});

		$("#submitpost").on('click', function(){
			
			var moduleid = $("#moduleid").val();
			var title = $("#title_post").val();
			var content = $("#content_post").val();
			
			if (moduleid == '') {
				alert("请先选择模块!");
				return false;
			}

			$.ajax({
				"type" : "post",
				"data" : {
					moduleid : moduleid,
					title : title,
					content : content
				},
				"dataType" : "html",
				"url" : "/index.php/bbs/post_action/addpost",
				"success" : function(data){
					if (data == 'success') {
    					$.ajax({
    						"type" : "post",
    						"data" : {
    							pagenum : 1,
    							site : 1
    						},
    						"dataType" : "html",
    						"url" : "/index.php/bbs/user_action/postlist",
    						"success" : function(data) {
    							$("#showhtml").html(data);
    						}
    					});
					}
				}
			});
		});
	});
</script>
