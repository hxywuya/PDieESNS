<?php
namespace sns\validate;

use think\Validate;

class User extends Validate
{
    protected $regex = [
        'userpassword' => '/^[a-z0-9]{6,20}$/i',
    ];

    protected $rule =   [
        'username'  => 'require|username',//用户手机号
        'userpassword'   => 'require|regex:userpassword',//账号密码
    ];
    
    protected $message  =   [
        'username.require' => '用户名必须',
        'username' => '预定手机号不正确',
        'userpassword.require' => '账号密码必须',
        'userpassword' => '账号密码只能由字母及数组组成，并且长度在6到20之间',
    ];

    protected $scene = [
        'login'  =>  ['username', 'userpassword'],
    ];

    protected function username($value)
    {
        $status = false;
        if (preg_match("/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/", $value) || preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $value)) {
            $status = true;
        }

        return $status;
    }
}
