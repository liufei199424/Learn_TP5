<input type="hidden" id="site" value="<?= $site?>">
<ul class="pagination" style="margin-top: 0px;margin-bottom: 0px;">
    <li>
         <a class="page" id="page-min" href="<?=$pagelink->url?>/pagenum/1/site/min">首页</a>
    </li>
    <?php
        $pages = $pagelink->getPages();
        foreach ($pages as $a) {
            if ($a != '...') {
                ?>
                    <li>
                         <a class="page" id="page-<?= $a?>" href="<?=$pagelink->url?>/pagenum/<?= $a?>/site/<?= $a?>"><?= $a?></a>
                    </li>
                <?php
            } else {
                ?>
                    <li>
                         <a href="#"><?= $a?></a>
                    </li>
                <?php
            }
        }
    ?>
    <li>
         <a class="page" id="page-max" href="<?=$pagelink->url?>/pagenum/<?=$pagelink->getTotalPage()?>/site/max">末页</a>
    </li>
    <li>
         <a href="#">[共<?= $pagelink->sum?>条,<?= $pagelink->pagesize?>条/页,第<?=$pagenum?>/<?= $pagelink->getTotalPage()?>页]</a>
    </li>
</ul>
<script>
	$(function(){
		var site = $("#site").val();
		$(".page").removeAttr('style');
		$("#page-" + site).attr('style', 'background-color: #008DB9;color:#fff');
	});
</script>
