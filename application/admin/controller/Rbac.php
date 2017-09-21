<?php
namespace app\admin\controller;

use sns\controller\AdminBase;

class Rbac extends AdminBase
{
    // public function index()
    // {
    //     $adminMenuModel = new \sns\model\AdminMenu();
    //     $this->assign("menuTree", $adminMenuModel->getMenutree());
    //     $this->assign("admininfo", $this->admininfo);
    //     return $this->fetch();
    // }
    
    public function group()
    {
        return $this->fetch();
    }

    public function grouplist()
    {
        $request = request();
        $param = $request->param();
        $adminGroupModel = new \sns\model\AdminGroup();
        $grouplist = $adminGroupModel->getGroupList($param['page'], $param['limit']);
        $this->buildRetval(1, '1', 200, $grouplist);
        $this->retval['count'] = $adminGroupModel->count();
        return $this->retval;
    }
}
