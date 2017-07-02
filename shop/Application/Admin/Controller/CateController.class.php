<?php
namespace Admin\Controller;

use Think\Page;

class CateController extends CommonController
{
    public $cateModel;
    public function __construct()
    {
        parent::__construct();
        $this->cateModel = D('Cate');
    }

    /**
     * 商品类型列表
     */
    public function cate_list()
    {
        //分页
        //获取总计录数
        $count = $this->cateModel->count();
        //实例化扉页
        $page = new Page($count,5);
        $page->setConfig('next','下一页');
        $page->setConfig('prev','上一页');
        $page->setConfig('end','末页');
        $page->setConfig('%FIRST%','首页');
        $page->setConfig('current','当前页');
        //显示分页
        $show = $page->show();
        $cate_data = $this->cateModel->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('cate_data',$cate_data);
        $this->assign('show',$show);
        $this->display();
    }
    /**
     * 商品类型增加
     */
    public function cate_add()
    {
        if (IS_POST){
            $data = I('post.');
             $res =  $this->cateModel->add($data);
            if ($res){
                $this->success('添加成功',U('cate_list'));die;
            }else{
                $this->error('添加失败');
            }
        }
        $this->display();
    }
    /**
     * 类型修改
     */
    public function cate_update()
    {
        if (IS_POST){
            $data = I('post.');
            $res = $this->cateModel->save($data);
            if ($res){
                $this->success('操作成功',U('cate_list'));die;
            }else{
                $this->error('操作失败');
            }
        }
        $id = I('id');
        $cate_data = $this->cateModel->find($id);
        $this->assign('cate_data',$cate_data);
        $this->display();
    }
    /**
     * 类型删除
     */
    public function cate_delete()
    {
        $id = I('id');
        $res = $this->cateModel->delete($id);
        if ($res){
            $this->success('操作成功');die;
        }else{
            $this->error('操作失败');
        }
    }
}