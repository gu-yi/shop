<?php
namespace Admin\Controller;


class BrandController extends CommonController
{
    //列表展示
    function brandList()
    {
        $model = D('brand');
        $data = $model->where('brand_status=1')->order('brand_sort')->select();
        $this->assign('data',$data);
        $this->display();
    }
    //添加品牌
    function add()
    {
        if (IS_POST){
            $model = D('brand');
            //验证brand_name不能为空
           $data = $model->create();
            if  ($data){
//                $model->brand_name = $_POST['name'];
//                $model->brand_sort = $_POST['sort'];
//                $arr = I();
//                $arr = $_POST;
//                $data =$model->parseFieldsMap($arr);
//                dump($arr);die;
                $rs = $model->add($data);
                if ($rs){
                    $this->success('添加成功',U('brandList'));die;
                }else{
                    $this->error('添加失败');//添加失败不添加url 返回原页面
                }
            }else{
            $this->error($model->getError());
            }

        }
        //获取类型
        $cate_data = D('Cate')->select();
        $this->assign('cate_data',$cate_data);
        $this->display();
    }
    //跟新方法
    public function update()
    {
        $id =$_GET['id'];
        $model = M('brand');
        if (IS_POST){
            //字段验证
            if ($model->create()){
                $datas = $_POST;
                $rs = $model->save($datas);
                if ($rs){
                    $this->success('修改成功',U('brandList'));
                }else{
                    $this->error('修改失败');
                }
            }else{
                $this->error($model->getError());
            }

        }else{
            $data = $model->find($id);
            $this->assign('a',$data);
            //获取类型
            $cate_data = D('Cate')->select();
            $this->assign('cate_data',$cate_data);
            $this->display();
        }
    }

    /**
     * 删除操作
     * 物理删除
     * 逻辑删除
     */
    public function delete()
    {
        $id =$_GET['id'];
        $model = D('brand');
        $rs = $model->save(array('id'=>$id,'brand_status'=>0));//隐士删除逻辑删除
        if ($rs){
            $this->success('删除成功',U('brandList'));
        }else{
            $this->error('修改失败');
        }
    }

}