<?php
namespace app\index\model;
use think\Model;
class Version extends Model{

 public function product(){

        return $this->belongsToMany('product','access','PRODUCT_ID','VERSION_ID');
    }
}
