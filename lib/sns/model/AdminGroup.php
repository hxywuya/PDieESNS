<?php
namespace sns\model;

use think\Model;

class AdminGroup extends Model
{

    public function getGroupList($page = 1, $limit = 10)
    {
        return $this->page($page, $limit)->select();
    }

    public function updateGroup($id = 0, $name = "", $remark = "", $status = "")
    {
        $code = $this->save([
            'name' => $name,
            'remark' => $remark,
            'status' => $status
        ],['id' => $id]);
        if ($code == 1) {
            return $this->where('id', $id)->find();
        } else {
            return false;
        }
    }
}