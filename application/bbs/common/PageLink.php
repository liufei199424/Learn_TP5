<?php
namespace app\bbs\common;

class PageLink {
    public $sum;
    public $pagenum;
    public $pagesize;
    public $url;

    public static function create ($cnt, $pagenum, $pagesize = 10, $url) {
        $pagelink = new PageLink();
        $pagelink->sum = $cnt;
        $pagelink->pagenum = $pagenum;
        $pagelink->pagesize = $pagesize;
        $pagelink->url = $url;

        return $pagelink;
    }

    // 总页数
    public function getTotalPage () {
        if ($this->sum % $this->pagesize == 0) {
            return $this->sum / $this->pagesize;
        } else {
            return floor($this->sum / $this->pagesize) + 1;
        }
    }

    // 用来生成分页标签
    public function getPages () {
        $list = [];
        $totalpage = $this->getTotalPage();
        if ($this->getTotalPage() < 6) {
            for ($i = 1; $i <= $totalpage; $i++) {
                $list[] = $i;
            }
        } else {
            $before = [];
            if ($this->pagenum < 5) {
                for ($i = 1; $i <= $this->pagenum; $i++) {
                    $before[] = $i;
                }
            } else {
                $before[] = 1;
                $before[] = '...';
                $before[] = $this->pagenum - 2;
                $before[] = $this->pagenum - 1;
                $before[] = $this->pagenum;
            }

            $after = [];
            if ($totalpage - $this->pagenum < 4) {
                for ($i = $this->pagenum + 1; $i <= $totalpage; $i ++) {
                    $after[] = $i;
                }
            } else {
                $after[] = $this->pagenum + 1;
                $after[] = $this->pagenum + 2;
                $after[] = '...';
                $after[] = $totalpage;
            }

            $list = array_merge($before, $after);
        }

        return $list;
    }
}
