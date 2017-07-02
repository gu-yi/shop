<?php
namespace Home\Controller;

use Think\Controller;

class CartController extends Controller
{
    //购物车列表页
    public function cart_list()
    {
        $totals = 0;//总额
        $mtotals = 0;//市场总额
        $num = 0 ;//购物车商品总数量
        if (session('?username')){
         //若已经登录查询数据库数据
            $cart_data = D('Cart')->select();
//            dump($cart_data);die;

            foreach ($cart_data as $key=>$value){
                $goods_data = D('Goods')->find($cart_data[$key]['goods_id']);
                $cart_data[$key]['goods_mprice'] = $goods_data['goods_mprice'];
                $cart_data[$key]['goods_attr']=json_decode($cart_data[$key]['goods_attr'],true);
                $cart_data[$key]['goods_smallpic'] = $goods_data['goods_smallpic'];
                $cart_data[$key]['goods_name'] = $goods_data['goods_name'];
                //小计
                $cart_data[$key]['goods_total'] = $cart_data[$key]['number']*$cart_data[$key]['goods_price'];
                //市场小计
                $cart_data[$key]['goods_mtotal'] = $cart_data[$key]['number']*$cart_data[$key]['goods_mprice'];
                //节约金额
                $cart_data[$key]['goods_chae'] = $cart_data[$key]['goods_mtotal']-$cart_data[$key]['goods_total'];
                $totals+=$cart_data[$key]['goods_total'];
                $mtotals+=$cart_data[$key]['goods_mtotal'];
                $num += $cart_data[$key]['number'];
                 }


        }else{
            //没有登录
            $cart_data = unserialize(cookie('goods_data'));

            foreach ($cart_data as $key=>$value){
                $goods_data = D('Goods')->find($key);
                $cart_data[$key]['goods_mprice'] = $goods_data['goods_mprice'];
                $cart_data[$key]['goods_smallpic'] = $goods_data['goods_smallpic'];
                $cart_data[$key]['goods_name'] = $goods_data['goods_name'];
                //小计
                $cart_data[$key]['goods_total'] = $cart_data[$key]['number']*$cart_data[$key]['goods_price'];
                //市场小计
                $cart_data[$key]['goods_mtotal'] = $cart_data[$key]['number']*$cart_data[$key]['goods_mprice'];
                //节约金额
                $cart_data[$key]['goods_chae'] = $cart_data[$key]['goods_mtotal']-$cart_data[$key]['goods_total'];
                $totals+=$cart_data[$key]['goods_total'];
                $mtotals+=$cart_data[$key]['goods_mtotal'];
                $num += $cart_data[$key]['number'];
            }
        }

        //总价和购物车数量保存进session
        session('totals',$totals);
        session('num',$num);
        $this->assign('cart_data',$cart_data);
        $this->assign('totals',$totals);
        $this->assign('mtotals',$mtotals);
        $this->display();
    }

    //购物车的添加
    public function cart_add()
    {
        $data = I('post.');
        //判断用户是否登录
        if (session('?user_id')){

            //登录后直接存到数据库中
          $data['goods_attr'] = json_encode($data['goods_attr']);
          $data['user_id'] = session('user_id');
          //添加同一件商品处理
            $where = array('user_id'=>session('user_id'),'goods_id'=>$data['goods)id']);
        $res = D('Cart')->where($where)->find();
        //若果商品存在直接数量加一
            if ($res){
                D('Cart')->where($where)->setInc('number',1);
            }else{
                //插入数据库

                D('Cart')->add($data);
            }
        }else{
            //没有登录
            //如果cookie存在数据追加进去
            if (cookie('goods_data')){
                //获取cookie中的值
                $cookie_data = cookie('goods_data');
                $datas = unserialize($cookie_data);
                //如果添加同样商品直接数量加一
               foreach ($datas as $key=>$value){
                    if ($key == $data['goods_id']){
                        $value['number']++;
                        $datas[$key]['number'] = $value['number'];
                    }else{
                        $datas[$data['goods_id']] = $data;
                    }
                }
            }else{
                $datas[$data['goods_id']] = $data;
            }
            $cart_str = serialize($datas);
            cookie('goods_data',$cart_str);
        }
        //控制器中直接跳转用redirect;
        $this->redirect('cart_list');
    }

    /**
     * 购物车商品删除
     */
    public function cart_del()
    {
        $goods_id = I('goods_id');

        if (session('?username')) {
            //登录后连接数据库删除
            $res = D('Cart')->where(array('goods_id'=>$goods_id,'user_id'=>session('user_id')))->delete();
            //dump($res);die;
            if ($res){
                $this->success('删除成功');
            }
        } else {
            //未登录直接删除cookie里面对饮数据
            $cart_data = unserialize(cookie('goods_data'));

            unset($cart_data[$goods_id]);

            //将删除后的数据放进cookie
            cookie('goods_data', serialize($cart_data));
            $this->success('删除成功');
        }

    }

    /**
     * 购物车清空操作
     */
    public function cart_all_delete()
    {
        session('totals',null);//清除总价记录
        session('num',null);//清除购物车数量记录
        //登录
        if (session('?username')){
            //清空当前用户购物车数据
            D('Cart')->where(array('user_id'=>session('user_id')))->delete();
        }else{
            //没有登录
            //将删除cookie购物车数据
            cookie('goods_data', null);
        }
    }

    /**
     * 购物车商品修改
     */
    public function cart_update()
    {
        $data = I('post.');
        //dump($data);die;
        $goods_id = $data['goods_id'];
        $goods_number = $data['number'];
        //购物车商品总价及数量跟新
        session('totals',$data['totals']);
        session('num',$data['num']);

        if (session('?username')) {
            //登录后连接数据库修改数据库
         D('Cart')->where(array('user_id'=>session('user_id'),'goods_id'=>$goods_id))->save(array('number'=>$goods_number));
        } else {

            $cart_data = unserialize(cookie('goods_data'));
            $cart_data[$goods_id]['number'] = $goods_number;
            //改变后的数据再保存进去
            cookie('goods_data', serialize($cart_data));
        }

    }

}