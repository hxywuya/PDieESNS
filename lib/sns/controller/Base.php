<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2017 http://www.???.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: PDieE <23275429@qq.com>
// +----------------------------------------------------------------------
namespace sns\controller;

use think\Controller;

class Base extends Controller
{
    // 返回值格式
    protected $retval = [
        'status' => 0,
        'code' => 0,
        'msg' => '',
        'data' => ''
    ];

    public function _initialize()
    {
    }

    /**
     * 构建返回值
     * @param  integer $status 状态码，必填
     * @param  string  $msg    返回信息，可选
     * @param  integer $code   错误代码，可选
     * @param  array  $data   返回数据，可选
     */
    public function buildRetval($status = 0, $msg = null, $code = null, $data = null)
    {
        $this->retval['status'] = $status;
        if (!is_null($msg)) {
            if (is_string($msg)) {
                $this->retval['msg'] = $msg;
            } elseif (is_numeric($msg)) {
                $this->retval['code'] = $msg;
            } else {
                $this->retval['data'] = $msg;
            }
        }
        if (!is_null($code)) {
            if (is_numeric($code)) {
                $this->retval['code'] = $msg;
            } else {
                $this->retval['data'] = $code;
            }
        }
        if (!is_null($data)) {
            $this->retval['data'] = $data;
        } 
    }

    /**
     * SNS密码加密方法
     * @param string $pw 要加密的原始密码
     * @param string $authCode 加密字符串
     * @return string
     */
    public function sns_password($pw, $authCode = '')
    {
        if (empty($authCode)) {
            $authCode = config('database.authcode');
        }
        $result = "###" . md5(md5($authCode . $pw));
        return $result;
    }

    /**
     * SNS密码比较方法,所有涉及密码比较的地方都用这个方法
     * @param string $password 要比较的密码
     * @param string $passwordInDb 数据库保存的已经加密过的密码
     * @return boolean 密码相同，返回true
     */
    public function sns_compare_password($password, $passwordInDb)
    {
        return $this->sns_password($password) == $passwordInDb;
    }

}