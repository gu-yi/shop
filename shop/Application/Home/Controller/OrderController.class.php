<?php
namespace Home\Controller;

use Think\Controller;

class OrderController extends Controller
{
    //订单页面
    public function buy()
    {

        //直接从商品详情页点击购买
        if (IS_POST){
          $data = $_POST;
          $goods_data = D('Goods')->where(array('id'=>$data['goods_id']))->find();
          $data['goods_name'] = $goods_data['goods_name'];
          $data['goods_mprice'] = $goods_data['goods_mprice'];
          //单一商品总价格
          $data['goods_total'] = $goods_data['goods_price']*$data['number'];
          //总的价格
            $totals =  $data['goods_total'];
          //方便循环显示变成2伪数组
          $buy_data[]=$data;
        //购物车跳转
        }else{
            $totals = 0;//商品总价
            //判断是否登录
            if(session('?user_id')){
                //登录后从数据库取取出商品数据
                $data = D('Cart')->where(array('user_id'=>session('user_id')))->select();

                foreach ($data as $key=>$value){
                    $goods_data = D('Goods')->where(array('id'=>$value['goods_id']))->find();
                    $value['goods_name'] = $goods_data['goods_name'];
                    $value['goods_mprice'] = $goods_data['goods_mprice'];
                    $value['goods_attr'] = json_decode($value['goods_attr'],true);
                    //总价
                    $value['goods_total'] = $goods_data['goods_price']*$value['number'];
                    //方便循环显示变成2伪数组
                    $buy_data[$key]=$value;
                    //订单总价
                    $totals +=  $value['goods_total'];


                }

            }else{
                //未登录
                $data = unserialize(cookie('goods_data'));
                foreach ($data as $key=>$value){
                    $goods_data = D('Goods')->where(array('id'=>$value['goods_id']))->find();
                    $value['goods_name'] = $goods_data['goods_name'];
                    $value['goods_mprice'] = $goods_data['goods_mprice'];
                    //$value['goods_attr'] = json_decode($value['goods_attr'],true);
                    //总价
                    $value['goods_total'] = $goods_data['goods_price']*$value['number'];
                    //方便循环显示变成2伪数组
                    $buy_data[$key]=$value;
                    //订单总价
                    $totals +=  $value['goods_total'];

                }


            }

        }
        //dump($buy_data);die;
        //获取收货地址信息
        $lo_data = D('Location')->where(array('user_id'=>session('user_id')))->find();
        $this->assign('lo_data',$lo_data);
        $this->assign('buy_data',$buy_data);
        $this->assign('order_data',serialize($buy_data));
        $this->assign('totals',$totals);
        $this->display();

    }
    //订单处理
    public function buy_add()
    {
        if (IS_POST){
            $data = $_POST;
            $goods_data = unserialize($data['order_data']);
            $datas['order_number'] = date('YmdHis').session('user_id');
            $datas['user_id'] =session('user_id');
            $datas['order_addtime'] =time();
            $datas['order_price'] =$data['totals'];
            $datas['order_pay'] =$data['order_pay'];
            $datas['location_id'] =$data['location_id'];
            $datas['order_exp'] =$data['order_exp'];
            //实例化添加进数据库
            $res = D('Order')->add($datas);
            if ($res){
                foreach ($goods_data as $key=>$value) {
                    //信息廷加进订单表
                    $goods_order[$key]['order_id'] = $res;
                    $goods_order[$key]['user_id'] = session('user_id');
                    $goods_order[$key]['og_price'] = $value['goods_price'];
                    $goods_order[$key]['og_number'] = $datas['order_number'];
                    $goods_order[$key]['og_total_price'] = $datas['order_price'];
                    $goods_order[$key]['og_goods_id'] = $value['goods_id'];
                    $goods_order[$key]['og_goods_attr'] = serialize($value['goods_attr']);
                }
                //dump($goods_order);die;
                //添加进数据库
                D('goodsOrder')->addAll($goods_order);
               //$this->success('订单生成中',U('Order/order_list',''));
                //增加成功跳转到订单详情，并且将订单号给传递过去
                $this->redirect('Order/order_list',array('order_id'=>$res));
            }else{
                $this->error('提交失败');
            }
        }
    }
    //订单详情页
    public function order_list()
    {
        $id = I('order_id');
        $data = D('Order')->where(array('user_id'=>session('user_id'),'id'=>$id))->find();
        $this->assign('data',$data);
        $this->display();
    }


    /**
     * 支付宝页面
     */
    //发起支付请求
    public function pay()
    {
        //获取订单信息
        $oid = I('oid');
        //获取订单信息[当前操作用户的订单]
        $order_data          = M('order')->where('user_id=' . session('uid') . ' and id=' . $oid)->find($oid);
        $order_data['title'] = 'PHP9商城-商品购买';
        $order_data['body']  = '商城内部购买的商品';

//引入支付宝使用verdor
        vendor('alipay.alipay_submit#class');
        $alipay_config = C('PAY_ALIPAY');

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service"           => $alipay_config['service'],
            "partner"           => $alipay_config['partner'],
            "seller_id"         => $alipay_config['seller_id'],
            "payment_type"      => $alipay_config['payment_type'],
            "notify_url"        => $alipay_config['notify_url'],
            "return_url"        => $alipay_config['return_url'],

            "anti_phishing_key" => $alipay_config['anti_phishing_key'],
            "exter_invoke_ip"   => $alipay_config['exter_invoke_ip'],
            "out_trade_no"      => $order_data['order_number'], //订单编号
            "subject"           => $order_data['title'],
            "total_fee"         => $order_data['order_price'],
            "body"              => $order_data['body'],
            "_input_charset"    => trim(strtolower($alipay_config['input_charset'])),
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"

        );

//建立请求
        $alipaySubmit = new \AlipaySubmit($alipay_config);
        $html_text    = $alipaySubmit->buildRequestForm($parameter, "get", "确认");
        echo $html_text;
    }
}