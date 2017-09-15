<?php
namespace app\api\validate;

use think\Validate;

class Order extends Validate
{
    protected $rule =   [
        'activityOrderId'  => 'require',//订单ID
        'page'   => 'require|number|egt:1',//页码
    ];
    
    protected $message  =   [
        'activityOrderId' => '类型ID必须',
        'page.require' => '页码必须',
        'page' => '页码不正确',
    ];

    protected $scene = [
        'unsubscribe'  =>  ['activityOrderId'],
        'getActivityOrder'  =>  ['page'],
    ];
}
