<?php
namespace Admin\Controller;
use Think\Page;
class AttributeController extends CommonController
{
    public $attrModel;//属性模型
    public $cateModel;//类型模型
    public function __construct()
    {
      parent::__construct();
      $this->cateModel = D('Cate');
      $this->attrModel = D('Attribute');
    }

    /**
     * 属性列表展示
     */
    public function attr_list()
    {
        //分页
        //获取总计录数
        $count = $this->attrModel->count();
        //实例化扉页
        $page = new Page($count,5);
        $page->setConfig('next','下一页');
        $page->setConfig('prev','上一页');
        $page->setConfig('end','末页');
        $page->setConfig('%FIRST%','首页');
        $page->setConfig('current','当前页');
        //显示分页
        $show = $page->show();
        $attr_data = $this->attrModel->field('a.*,b.cate_name')->alias('a')->join('left join tp_cate as b on a.cate_id=b.id')->where(array('a.attr_status=1'))->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('attr_data',$attr_data);
        $this->assign('show',$show);
        $this->display();
    }

    /**
     * 属性添加
     */
    public function attr_add()
    {
        //提交数据处理
        if (IS_POST){
            $data = I('post.');
            //将中文状态的逗号替换成英文状态下逗号
            $data['attr_val'] = str_replace('，',',',$data['attr_val']);
            $res =  $this->attrModel->add($data);
            if ($res){
                $this->success('添加成功',U('attr_list'));die;
            }else{
                $this->error('添加失败');
            }
        }
        //获取商品类型
        $this->assign('cate_data',$this->cateModel->select());
        $this->display();
    }
    //添加获取类型数据
    public function get_attr()
    {
        $cate_id = I('cate_id');
        $attr_data = $this->attrModel->where('cate_id='.$cate_id)->select();
        $attr_data = json_encode($attr_data);
        echo $attr_data;die;
    }
    //属性删除
    public function attr_delete()
    {
        //逻辑删除
        $data['id'] = I('id');
        $data['attr_status'] = 0;

        $res = $this->attrModel->save($data);
        if ($res){
            $this->success('操作成功');die;
        }else{
            $this->error('操作失败');
        }
    }
    /**
     * 属性修改
     */
    public function attr_update()
    {
        if (IS_POST){
//            dump(I('post.'));die;
        $res = $this->attrModel->save(I('post.'));
            if ($res){
                $this->success('操作成功',U('attr_list'));die;
            }else{
                $this->error('操作失败');
            }
        }
        $id = I('id');
        $attr_data = $this->attrModel->find($id);
        $this->assign('attr_data',$attr_data);
        //获取商品类型
        $this->assign('cate_data',$this->cateModel->select());

        $this->display();
    }
}
