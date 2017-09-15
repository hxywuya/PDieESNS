<?php
namespace app\admin\controller;

use sns\controller\AdminBase;

class Index extends AdminBase
{
    public function index()
    {
        return $this->fetch();
    }
}
