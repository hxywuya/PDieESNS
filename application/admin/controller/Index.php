<?php
namespace app\admin\controller;

use sns\controller\AdminBase;

class Index extends AdminBase
{
    public function index()
    {
        $adminMenuModel = new \sns\model\AdminMenu();
        $this->assign("menuTree", $adminMenuModel->getMenutree());
        $this->assign("admininfo", $this->admininfo);
        return $this->fetch();
    }
}
