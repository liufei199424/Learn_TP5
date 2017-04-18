<?php
namespace app\bbs\controller;

class PageLink {
    public $sum;
    public $pagesize;
    public $url;

    public static function create ($cnt, $pagesize = 10, $url) : PageLink {
        $pagelink = new PageLink();
        $pagelink->sum = $cnt;
        $pagelink->pagesize = $pagesize;
        $pagelink->url = $url;

        return $pagelink;
    }

    // 总页数
    public function getTotalPage () {
        if ($this->$sum % $this->pagesize == 0) {
            return $sum / $pagesize;
        } else {
            return floor($sum / $pagesize) + 1;
        }
    }
}
