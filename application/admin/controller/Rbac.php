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
            switch ($param["type"]) {
                case 'domodify':
                    return $this->groupModify();
                    break;
                
                default:
                    
                    break;
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

    private function groupModify()
    {
        $request = request();
        $param = $request->param();
        $adminGroupModel = new \sns\model\AdminGroup();
        $group = $adminGroupModel->updateGroup($param['id'], $param['name'], $param['remark'], $param['status']);
        if ($group) {
            $this->buildRetval(1, '更新成功', 200, $group);
        }
        return $this->retval;
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
