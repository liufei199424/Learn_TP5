<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 
<!-- 可选的Bootstrap主题文件（一般不使用） -->
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script>
 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
 
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- bootstrap -->

<style>
.pageclick {	
    background-color: #008DB9;
    color:#fff
}
</style>
<input type="hidden" id="title" value="<?= $title ?>">
<script>
	$(function(){
		var title = $("#title").val();
		$(".title").removeAttr('style');
		$("#title-" + title).attr('style', 'background-color: #008DB9;color:#fff');
	});
</script>