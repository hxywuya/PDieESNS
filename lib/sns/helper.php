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

//------------------------
// ThinkCMF 助手函数
//-------------------------

/**
 * 实例化验证器
 * @param string    $name 验证器名称
 * @return \think\Validate
 */
function sns_validate($name = '')
{
    $classpath = '\sns\validate\\' . $name;
    $validate = new $classpath;
    return $validate;
}