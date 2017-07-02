<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Image;
use Think\Page;

class SystemController extends CommonController
{
    //重复使用模型处理
    public $menuModel;
    public $roleModel;
    public $accessModel;
    public function __construct()
    {
        parent::__construct();
        $this->menuModel = D('Menu');
        $this->roleModel = D('Role');
        $this->accessModel = D('Access');
    }

    /**
     * 权限菜单列表显示
     */
    public function menuList()
    {
		
		//分页
        //获取总计录数
        $count = $this->menuModel->count();
        //实例化扉页
        $page = new Page($count,10);
        $page->setConfig('next','下一页');
        $page->setConfig('prev','上一页');
        $page->setConfig('end','末页');
        $page->setConfig('%FIRST%','首页');
        $page->setConfig('current','当前页');
        //显示分页
        $show = $page->show();
        $menuData = $this->menuModel->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('menuData',$menuData);
		$this->assign('show',$show);
        $this->display();
    }
    /**
     * 权限菜单列表增加
     */
    public function menuAdd()
    {
        //处理提交数据
        if (IS_POST){
            $data = I('post.');
           $res  = $this->menuModel->add($data);
            if ($res){
                $this->success('添加成功',U('menuList'));die;
            }else{
                $this->error('添加失败');
            }
        }
        //获取所有菜单栏
        $datas = $this->menuModel->select();
        //树形显示菜单
        $treeData =  getTree($datas);
        $this->assign('datas',$treeData);
        $this->display();
    }
    /**
     * 权限菜单修改
     */
    public function menu_update()
    {
        if (IS_POST){
           $data = I('post.');
            $res = $this->menuModel->save($data);
            if ($res){
                $this->success('修改成功',U('menuList'));die;
            }else{
                $this->error('修改失败');
            }
        }
        $id = I('id');
        $menu_data = $this->menuModel->find($id);
        $this->assign('menu_data',$menu_data);
        //获取所有菜单栏
        $datas = $this->menuModel->select();
        //树形显示菜单
        $treeData =  getTree($datas);
        $this->assign('datas',$treeData);
        $this->display();
    }
    /**
     * 权限修改
     */
    public function menu_del()
    {
        $id = I('id');
        $res = $this->menuModel->delete($id);
        if ($res){
            $this->success('操作成功');die;
        }else{
            $this->error('操作失败');
        }
    }


    /**
     * 角色展示
     */
    public function roleList()
    {
		//分页
        //获取总计录数
        $count = $this->roleModel->count();
        //实例化扉页
        $page = new Page($count,5);
        $page->setConfig('next','下一页');
        $page->setConfig('prev','上一页');
        $page->setConfig('end','末页');
        $page->setConfig('%FIRST%','首页');
        $page->setConfig('current','当前页');
        //显示分页
        $show = $page->show();
        $roleData = $this->roleModel->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('roleData',$roleData);
		$this->assign('show',$show);
        $this->display();
    }

    /**
     * 角色添加
     */
    public function roleAdd()
    {
        if (IS_POST){
            $data = I('post.');
          $res = $this->roleModel->add($data);
            if ($res){
                $this->success('添加成功',U('roleList'));die;
            }else{
                $this->error('添加失败');
            }
        }
        $this->display();
    }
    //角色修改
    /**
     * 角色添加
     */
    public function role_update()
    {
        if (IS_POST){
            $data = I('post.');
//            dump($data);die;
            $res = $this->roleModel->save($data);
            if ($res){
                $this->success('操作成功',U('roleList'));die;
            }else{
                $this->error('操作失败');
            }
        }
        $id = I('id');
        $role_data = $this->roleModel->find($id);
        $this->assign('role_data',$role_data);
        $this->display();
    }
    /**
     * 角色删除
     */
    public function role_delete()
    {

        $res = $this->roleModel->delete(I('id'));
        if ($res){
            $this->success('操作成功');die;
        }else{
            $this->error('操作失败');
        }
    }

    /**
     * 权限修改列表
     */
    public function accessList()
    {
        //查询要分配的权限的角色
        $id = I('id');
        $data = $this->roleModel->find($id);
        $this->assign('data',$data);
        //显示所有的权限
        $menuData = $this->menuModel->select();
        $menuData = list_to_tree($menuData);
        $this->assign('menuData',$menuData);
        //出路默认勾选
        $accessData = $this->accessModel->field('menu_id')->where('role_id='.$id)->select();
        //数组进行降维
        $accessData = array_column($accessData,'menu_id');
        $this->assign('accessData',$accessData);
        $this->display();

    }
    /**
     * 权限修改处理
     */
    public function accessUpdate()
    {
        if (IS_POST) {
          $datas = I('post.');
//            dump($datas);die;
       foreach ($datas['menus'] as $key=>$value){
           $data[$key]['role_id'] = $datas['role_id'];
           $data[$key]['menu_id'] = $value;
       }

            //防止重复增加在增加之前删除所有权限
            $this->accessModel->where('role_id='.$datas['role_id'])->delete();
       $res = $this->accessModel->addAll($data);
            if ($res){
                $this->success('操作成功',U('roleList'));die;
            }else{
                $this->error('操作失败');
            }
        }
    }
}