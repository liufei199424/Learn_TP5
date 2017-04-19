<?php

namespace app\bbs\controller;

use think\Controller;
use think\Session;

class ModuleAction extends Controller {
    
    public function list () {
        
        $user = Session::get('user');
        
        $this->view->user = $user;
        
        return $this->fetch();
    }
}