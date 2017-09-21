<?php
namespace sns\model;

use think\Model;

class AdminMenu extends Model
{

    /**
     * 获取菜单树
     * @return [type] [description]
     */
    public function getMenutree()
    {
        $menulist = $this->where("status", 1)->select();
        $menutree = [];
        $submenu = [];
        $listcount = count($menulist);
        // 一级菜单
        for ($i = 0; $i < $listcount; $i++) { 
            if ($menulist[$i]['parent_id'] == 0) {
                array_push($menutree, $menulist[$i]);
                // 二级菜单
                $submenu = [];
                for ($j = 0; $j < $listcount; $j++) { 
                    if ($menulist[$j]['parent_id'] == $menulist[$i]['id']) {
                        array_push($submenu, $menulist[$j]);
                    }
                }
                $menutree[count($menutree) - 1]['submenu'] = $submenu;
            }
        }
        return $menutree;
    }
}