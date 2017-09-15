<?php
namespace app\api\validate;

use think\Validate;

class Sub extends Validate
{
    protected $regex = [
        'mobile' => '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/',
    ];
    
    protected $rule =   [
        'appsbjID'  => 'require',//栏目ID
        'page'   => 'require|number|egt:1',//页码
    ];
    
    protected $message  =   [
        'appsbjID' => '类型ID必须',
        'page.require' => '页码必须',
        'page' => '页码不正确',
    ];
}
