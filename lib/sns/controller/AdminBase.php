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

    public function _initialize()
    {
        parent::_initialize();
        $adminid = session('ADMIN_ID');
        if (!empty($adminid)) {
            $user = Db::name('user')->where(['id' => $adminid])->find();

            if (!$this->checkAccess($adminid)) {
                $this->error("您没有访问权限！");
            }
            $this->assign("admin", $user);
        } else {
            if ($this->request->isPost()) {
                $this->error("您还没有登录！", url("admin/common/login"));
            } else {
                header("Location:" . url("admin/common/login"));
                exit();
            }
        }
    }

}