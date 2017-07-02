<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {
    public function index()
    {
        //获取所有的上【商品】
        $goods_model = D('Goods');
        //访问量排行获取
        $click_data = $goods_model->order('goods_click desc')->select();
        //添加时间降序
        $time_data = $goods_model->order('goods_addtime desc')->select();
        //市场价格排序
        $mprice_data = $goods_model->order('goods_mprice desc')->select();
        $this->assign('click_data',$click_data);
        $this->assign('time_data',$time_data);
        $this->assign('mprice_data',$mprice_data);
        //天气信息保存进session
        $arr = getWeather();
        session('weather',$arr);

        //获首页新闻标题
        $data = D('News')->select();
        $this->assign('data',$data);
        //获取类型数据
        $cate_data = D('Cate')->select();
       // dump($cate_data);die;
        //$arr = D('Goods')->where('cate_id=1')->select();
        foreach ($cate_data as $key=>$value){
          //$arr = D('goods')->field('goods_name')->where('cate_id='.$key)->select();
          $arr = D('Brand')->field('brand_name')->where('cate_id='.$value['id'])->select();

            $datas[$value['id']]['cate_name']=$value['cate_name'];

           $datas[$value['id']]['brand_name']=array_column($arr,'brand_name');
        }
        $this->assign('datas',$datas);
        $this->display();
    }
    //手机号码归属地查询
    public function getTel()
    {
        $tel = I('tel');

        //$tel = '18866201750';
        $url     = 'http://cx.shouji.360.cn/phonearea.php?number='.$tel;
        $content = file_get_contents($url);
        //$arr     = json_decode($content, true);
        //$str =$arr['data']['province'].$arr['data']['city'].$arr['data']['sp'];
        echo $content;
    }
}