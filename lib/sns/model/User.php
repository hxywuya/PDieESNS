<?php
namespace sns\model;

use think\Model;

class User extends Model
{

    /**
     * 根据user_name|user_email|user_mobile获取用户信息
     * @param  string $param 用户名 || 用户邮箱 || 用户手机号
     * @return [type]         [description]
     */
    public function getUserInfo($param = '')
    {
        return $this->where('user_name|user_email|user_mobile',$param)->find();
    }
}