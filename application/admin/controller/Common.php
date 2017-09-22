<?php
namespace app\admin\controller;

use sns\controller\AdminBase;

class Common extends AdminBase
{

    public function _initialize()
    {
        
    }

    public function login()
    {
        return $this->fetch();
    }

    public function doLogin()
    {
        // 获取请求参数
        $request = request();
        $param = $request->param();

        $validate = sns_validate('User');
        if (!$validate->scene('login')->check($param)) {
            $this->retval['msg'] = $validate->getError();
            return $this->retval;
        }

        $userModel = new \sns\model\User();
        $userinfo = $userModel->getUserInfo($param['username']);

        if ($userinfo) {
            if ($this->sns_compare_password($param['userpassword'], $userinfo->user_pass)) {
                $this->buildRetval(1, "登录成功");
                session('ADMIN_ID', $userinfo->id);
            } else {
                $this->buildRetval(0, "密码不正确");
            }
        } else {
            $this->buildRetval(0, "用户不存在");
        }
        return $this->retval;

    }

    public function logout()
    {
        session('ADMIN_ID', null);
    }
}
