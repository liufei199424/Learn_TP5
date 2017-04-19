<!DOCTYPE html>
<html>
<head>
<title>BBS系统</title>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if (PATH_SEPARATOR == ':') {
		$path = "/home/fhw/tp5/Learn_TP5/application/bbs/view";
	} else {
		$path = "F:/Tp5/Learn_TP5/application/BBS/view";
	}
    include $path . "/_head.php";
?>
</head>
<body>
    <div class="container">
    	<?php 
    	   include $path . "/_title.php";
    	?>
    </div>
    <div class="container">
    	<div class="row clearfix">
    		<div class="col-md-2 column">
    			<div class="panel-group">
    				<?php 
    				    foreach ($modules as $a) {
    				    ?>
            				<div class="panel panel-default">
            					<div class="panel-heading select" data-moduleid="<?= $a->id ?>">
            						 <span class="panel-title collapsed"><?= $a->title ?></span>
            					</div>
            				</div>
    				    <?php
    				    }
    				?>
    			</div>
    		</div>
    		<div class="col-md-10 column">
    			<div>
        			<p>
        				 <em>Git</em> 是一个分布式的版本控制系统，最初由 <strong>Linus Torvalds</strong> 编写，用作Linux内核代码的管理。在推出后，Git在其它项目中也取得了很大成功，尤其是在 <small>Ruby</small> 社区中。
        			</p>
        			
        			<p>
        				分布式相比于集中式的最大区别在于开发者可以提交到本地，每个开发者通过克隆（git clone），在本地机器上拷贝一个完整的Git仓库。
                                                                    下图是经典的git开发过程。
                                                                    
                         Git的功能特性：<br>
                                                                    从一般开发者的角度来看，git有以下功能：<br>
                        1、从服务器上克隆完整的Git仓库（包括代码和版本信息）到单机上。<br>
                        2、在自己的机器上根据不同的开发目的，创建分支，修改代码。<br>
                        3、在单机上自己创建的分支上提交代码。<br>
                        4、在单机上合并分支。<br>
                        5、把服务器上最新版的代码fetch下来，然后跟自己的主分支合并。<br>
                        6、生成补丁（patch），把补丁发送给主开发者。<br>
                        7、看主开发者的反馈，如果主开发者发现两个一般开发者之间有冲突（他们之间可以合作解决的冲突），就会要求他们先解决冲突，然后再由其中一个人提交。如果主开发者可以自己解决，或者没有冲突，就通过。<br>
                        8、一般开发者之间解决冲突的方法，开发者之间可以使用pull 命令解决冲突，解决完冲突之后再向主开发者提交补丁。<br>
                                                              从主开发者的角度（假设主开发者不用开发代码）看，git有以下功能：<br>
                        1、查看邮件或者通过其它方式查看一般开发者的提交状态。<br>
                        2、打上补丁，解决冲突（可以自己解决，也可以要求开发者之间解决以后再重新提交，如果是开源项目，还要决定哪些补丁有用，哪些不用）。<br>
                        3、向公共服务器提交结果，然后通知所有开发人员。<br>
                                                                    优点：<br>
                                                                    适合分布式开发，强调个体。<br>
                                                                    公共服务器压力和数据量都不会太大。<br>
                                                                    速度快、灵活。<br>
                                                                    任意两个开发者之间可以很容易的解决冲突。<br>
                                                                    离线工作。<br>
                                                                    缺点：<br>
                                                                    资料少（起码中文资料很少）。<br>
                                                                    学习周期相对而言比较长。<br>
                                                                    不符合常规思维。<br>
                                                                    代码保密性差，一旦开发者把整个库克隆下来就可以完全公开所有代码和版本信息。<br>
        			</p>
    			</div>
    		</div>
    	</div>
    </div>
</body>
<script type="text/javascript">
	$(function(){
		$(".select").on('click', function(){
			$(".select").removeAttr('style');
			$(this).attr('style', 'background-color: #008DB9;color:#fff');

			
		});
	});
</script>
</html>
