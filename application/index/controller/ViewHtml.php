<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Data;

class ViewHtml extends Controller {
    
    public function index () {
        $this->assign('name', '九州一剑知');
        
        return $this->fetch();
    }
    
    public function oneshow () {
        $data = Data::get(['data' => 'cc是人']);
        
        $this->assign('data', $data);
        
        return $this->fetch();
    }
    
}