<?php
namespace sns\model;

use think\Model;

class AdminGroup extends Model
{

    public function getGroupList($page = 1, $limit = 10)
    {
        return $this->page($page, $limit)->select();
    }
}