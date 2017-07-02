<?php
namespace Admin\Model;
use Think\Model;

class BrandModel extends Model
{
//字段验证
    protected  $_validate =array(
      array('brand_name','require','产品名称不能为空'),
      array('brand_sort','require','排序不能为空请输入'),
    );
    protected $_map = array(
//        'brand_name'=> 'name' ,
//        'brand_sort' =>'sort' ,
        'sort' => 'brand_sort',
        'name' => 'brand_name',
    );
    //查询品牌
    public function brandList()
    {
        $brandData = $this->where('brand_status=1')->select();
        return $brandData;
    }
}