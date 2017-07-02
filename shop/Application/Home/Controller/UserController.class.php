<?php
/**
 * User: yuqing
 * Date: 2017/6/12
 * Time: 19:17
 */
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller
{
    //用户中心
    public function user_list()
    {

        $this->display();
    }


    //用户地址
    public function user_msg()
    {

        //新增地址处理、
        if  (IS_POST){
            $data = I('post.');
            //dump($data);die;
            //插入数据库
            $res = D('Location')->add($data);
            if ($res){
                $this->success('添加成功');
            }else{
                $this->error('添加成功');
            }
        }

        $this->display();
    }


    public function msg_upate(){
        if (IS_POST){
            $data = I('post.');

        }
    }
    //用户订单
    public function order()
    {

        $this->display();
    }
    //三级菜单处理
    public function city()
    {
        $pid = I('pid');
       $data = D('City')->where('pid='.$pid)->select();
       echo json_encode($data);
    }
}