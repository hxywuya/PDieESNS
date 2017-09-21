<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.???.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: PDieE <23275429@qq.com>
// +----------------------------------------------------------------------
namespace sns\controller;

use think\Db;

class AdminBase extends Base
{

    protected $admininfo = null;

    public function _initialize()
    {
        parent::_initialize();
        $adminid = session('ADMIN_ID');
        if (!empty($adminid)) {
            $this->admininfo = Db::name('user')->where(['id' => $adminid])->find();

            if (!$this->checkAccess($adminid)) {
                $this->error("您没有访问权限！");
            }
            $this->assign("admin", $this->admininfo);
        } else {
            if ($this->request->isPost()) {
                $this->error("您还没有登录！", url("admin/common/login"));
            } else {
                header("Location:" . url("admin/common/login"));
                exit();
            }
        }
    }

    /**
     *  检查后台用户访问权限
     * @param int $userId 后台用户id
     * @return boolean 检查通过返回true
     */
    private function checkAccess($userId)
    {
        // 如果用户id是1，则无需判断
        if ($userId == 1) {
            return true;
        }

        $module     = $this->request->module();
        $controller = $this->request->controller();
        $action     = $this->request->action();
        $rule       = $module . "/" . $controller . "/" . $action;

        $notRequire = ["admin/Index/index", "admin/Main/index"];
        if (!in_array($rule, $notRequire)) {
            return cmf_auth_check($userId);
        } else {
            return true;
        }
    }

}