<?php
namespace app\admin\controller;

use sns\controller\AdminBase;

class Rbac extends AdminBase
{
    public function group()
    {
        $request = request();
        if ($request->isPost()) {
            $param = $request->param();
            if (!isset($param["type"])) {
                return $this->grouplist();
            }
        }
        
        return $this->fetch();
    }

    public function user()
    {
        $request = request();
        if ($request->isPost()) {
            $param = $request->param();
            if (!isset($param["type"])) {
                return $this->adminList();
            }
        }
        
        return $this->fetch();
    }

    private function grouplist()
    {
        $request = request();
        $param = $request->param();
        $adminGroupModel = new \sns\model\AdminGroup();
        $grouplist = $adminGroupModel->getGroupList($param['page'], $param['limit']);
        $this->buildRetval(1, '1', 200, $grouplist);
        $this->retval['count'] = $adminGroupModel->count();
        return $this->retval;
    }

    private function adminList()
    {
        $request = request();
        $param = $request->param();
        $adminUserModel = new \sns\model\AdminUser();
        $adminlist = $adminUserModel->getAdminList($param['page'], $param['limit']);
        $this->buildRetval(1, '1', 200, $adminlist);
        $this->retval['count'] = $adminUserModel->count();
        return $this->retval;
    }
}
