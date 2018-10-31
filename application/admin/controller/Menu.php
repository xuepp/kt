<?php
namespace app\admin\controller;

use think\Controller;

use think\Db;

use app\admin\model\Online;

class Menu extends Controller
{
    public function index()
    {
        return $this->fetch();

    }

    public function check()
    {


    	$param = input('post.');
        #print_r($param);
        $arr_version=array_filter($param['version']);
        $store_code=$param['store_code'];
        $str = implode(",",$arr_version); //把数组元素转换成一个字符串

        if(empty($str)){
            $this->error('错误：必须选择一个菜单版本');
        }


        if(empty($param['store_code'])){
            $this->error('错误：餐厅编码不能为空');
        }


        $arr_store = explode(',',$store_code);//字符串转化为数组

        foreach($arr_version as $version){ 

            foreach ($arr_store as $store_code) {
                //echo $version.'+'.$store_code.'<br />'; 
                $this->delonline($store_code,$version);
                $this->addonline($store_code,$version);

            }
        } 

        
    }

    protected function delonline($store_code,$version)
    {
        $sql=delonlinesql($store_code,$version);

        $result = Db::execute($sql);
        echo $store_code."清空".$result."条数据"."<br>";

    }


    protected function addonline($store_code,$version)
    {
       
        $sql=addonlinesql($store_code,$version);

        $result = Db::execute($sql);
        echo $store_code."插入".$result."条数据"."<br>";
    }





}
?>