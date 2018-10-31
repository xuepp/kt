<?php
namespace app\admin\model;

use think\Model;

class Version extends Model
{
	// 定义多对多关联
    public function product()
    {
    // 用户 BELONGS_TO_MANY 角色
        return $this->belongsToMany('product', 'access','POS_CODE','VERSION_ID');
    }

}


