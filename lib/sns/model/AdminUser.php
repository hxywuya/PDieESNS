<?php
namespace sns\model;

use think\Model;

class AdminUser extends Model
{
    public function getAdminList($page = 1, $limit = 10)
    {
        return $this
                    ->alias('a')
                    ->join('__ADMIN_GROUP__ w','w.id = a.group_id')
                    ->join('__USER__ c','c.id = a.user_id')
                    ->page($page, $limit)
                    ->select();
    }
}