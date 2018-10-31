<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Version;

class index extends Controller
{
    /**
     * @param string $name
     */
    public function index($name='name')
    {
        //获取学生A的所有数据
        //$version=Version::getByVersion_name('一般通路标准版全');
        $version=Version::get(1,'product');
       //因为获取到的数据都是数组里包含对象所以需要循环出数组里的对象在把每一个对象转为数组在输出
        var_dump($version->product);

    }

}
?>