<?php
namespace app\api\validate;

use think\Validate;

class Activity extends Validate
{
    protected $regex = [
        'mobile' => '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/',
    ];
    
    protected $rule =   [
        'tagId'  => 'length:0,32',//类型ID
        'page'   => 'require|number|egt:1',//页码
        'activityId' => 'require',//活动ID
        'bookCount' => 'require|number|between:1,3',//预订票数
        'orderPhone' => 'require|regex:mobile',//预订手机号
    ];
    
    protected $message  =   [
        'tagId' => '类型ID必须',
        'page.require' => '页码必须',
        'page' => '页码不正确',
        'activityId' => '活动ID必须',
        'bookCount.require' => '预订票数必须',
        'bookCount' => '预订票数不得大于3张，且必须为数字',
        'orderPhone.require' => '预订手机号必须',
        'orderPhone' => '预定手机号不正确',
    ];

    protected $scene = [
        'list'  =>  ['tagId', 'page'],
        'bookActivity'  =>  ['activityId', 'bookCount', 'orderPhone'],
    ];
}
