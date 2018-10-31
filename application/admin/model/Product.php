<?php
namespace app\admin\model;

use think\Model;

class Product extends Model
{
    public function version()
    {
        // 角色 BELONGS_TO_MANY 用户
        //return $this->belongsToMany('Version', 'access');
    }

}