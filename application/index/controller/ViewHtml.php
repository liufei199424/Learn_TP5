<?php

namespace app\index\controller;

use think\Controller;

class ViewHtml extends Controller {
    
    public function index () {
        $this->assign('name', '九州一剑知');
        
        return $this->fetch('');
    }
    
}