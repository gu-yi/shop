<?php
namespace Admin\Controller;

use Think\Image;
use Think\Page;
use Think\Upload;

class GoodsController extends CommonController
{
    /**
     * 后台显示商品列表
     */
    public function showlist()
    {
        $model = D('Goods');
        //获取总计录数
        $count = $model->count();
        //实例化扉页
        $page = new Page($count,5);
        $page->setConfig('next','下一页');
        $page->setConfig('prev','上一页');
        $page->setConfig('end','末页');
        $page->setConfig('%FIRST%','首页');
        $page->setConfig('current','当前页');
        //显示分页
        $show = $page->show();
        $data = $model->field('a.*,b.brand_name')->table(array('tp_goods'=>'a','tp_brand'=>'b'))->where(array('a.brand_id=b.id'))->limit($page->firstRow.','.$page->listRows)->select();
//        $data = $model->field('a.*,b.brand_name')->alias('a')->join('left join tp_brand as b on a.brand_id=b.id')->where('a.goods_status=1')->limit($page->firstRow.','.$page->listRows)->select();
        //显示商品类别
        /*$brand_model = D('brand');
        foreach ($data as $key => $value){
            $brand_data = $brand_model->find($value['brand_id']);
            $data[$key]['brand_name'] = $brand_data['brand_name'];
        }*/
        $this->assign('show',$show);
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 添加商品
     */
    public function add()
    {
        //提交数据处理
        if (IS_POST){
          //$data = I('post.');//可以防止xss攻击
            $data = $_POST;
            //防止xss攻击
            //方法2内心函数
//            $data['goods_introduce'] = htmlspecialchars($data['goods_introduce']);
            //放方法3外部第三方
            //引入文件
//            Vendor('htmlpurifier.library.HTMLPurifier#auto');
            //获取默认配置
//            $config = \HTMLPurifier_Config::createDefault();
//            $purifier = new \HTMLPurifier($config);
//            $data['goods_introduce'] = $purifier->purify($data['goods_introduce']);
            //封装后的防xss攻击
            //图片上传
            if ($_FILES['goods_image']['name'] != ''){
                //配置参数
                $config = array(
                    'maxSize'    =>    3145728,
                    'rootPath'   =>    UPLOAD,
                    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                    );
                //实例化上传文件类
                $upload = new Upload($config);
                $info = $upload->upload();
//                dump($info);die;
              if (!$info){
                  $this->error($upload->getError());
              }
              //缩略图处理
                $images = new Image();
              //打开图片
                $images->open(UPLOAD.$info['goods_image']['savepath'].$info['goods_image']['savename']);
                //进行图片缩放
                $images->thumb(100,100)->save(UPLOAD.$info['goods_image']['savepath'].'thump_'.$info['goods_image']['savename']);
                //图片地址写入数据库
                $data['goods_bigpic'] = $info['goods_image']['savepath'].$info['goods_image']['savename'];
                //缩略图写入数据库
                $data['goods_smallpic'] = $info['goods_image']['savepath'].'thump_'.$info['goods_image']['savename'];
            }

            //调用封装方法防xss攻击
            $data['goods_introduce'] = cleanData($data['goods_introduce']);

            //添加时间
            $data['goods_addtime'] = time();
          $model = D('Goods');
          $res = $model->add($data);

            if ($res){

                foreach ($data['goods_attr'] as $key=>$value){
                    $attr_data[] = array(
                        'goods_id' => $res ,
                        'attr_id' => $key ,
                        'goods_attr_val' => implode(',',$value)
                    );
                }
//                dump($attr_data);die;
                D('Goodsattr')->addAll($attr_data);
                $this->success('添加成功',U('Goods/showlist'));
            }else{
                $this->error('添加失败');//添加失败不添加url 返回原页面
            }
        }else{
            //显示品牌列表
            $brand_model = D('Brand');
            $data = $brand_model->where('brand_status=1')->order('brand_sort')->select();
            $this->assign('data',$data);
            //获取商品类型数据
            $cate_data = D('Cate')->select();
            $this->assign('cate_data',$cate_data);
            $this->display();
        }

    }
    /**
     * 删除商品处理
     */
    public function delete()
    {
        $id = I('id');
        //接受数据查询
        $model = D('goods');
        $res = $model->find($id);
        if ($res['goods_status'] == 1){
            //改变状态
            $data['goods_status'] = 0;
            $msg = '上架';
        }else{
            $data['goods_status'] = 1;
            $msg = '下架';
        }
        $data['id'] = $id;
        //跟新数据库
        $res = $model->save($data);
        if ($res){
            $this->success($msg);
        }else{
            $this->error('操作失败');
        }

    }
    /**
     * 商品相册处理
     */
    public function pic()
    {
        $id = I('id');
//        dump($_FILES);die;
        if  ($_FILES){
            $infos = picUpload();
//           dump($infos);die;
            //循环处理图片
            $images = new Image();
            $i =0;
            foreach ($infos as $key=>$info) {
                //缩略图处理
                $images->open(UPLOAD . $info['savepath'] . $info['savename']);
                $images->thumb(100.100)->save(UPLOAD . $info['savepath'] . 'thump_' . $info['savename']);
                $data[$i]['pic_big'] = $info['savepath'] . $info['savename'];
                $data[$i]['pic_small'] = $info['savepath'] . 'thump_' . $info['savename'];
                $data[$i]['goods_id'] = I('id');
                $i++;
            }
            $model = D('pic');
            $res = $model->addAll($data);
            if ($res){
                $this->success('添加成功',U('pic','id='.$id));
            }else{
                $this->error('添加失败');//添加失败不添加url 返回原页面
            }
        }else {
            $model = D('pic');
            $data = $model->where('goods_id=' . $id)->select();
            $this->assign('data', $data);
            $model = D('goods');
            $d = $model->find($id);

            $this->assign('d', $d);
            $this->display();
        }

    }
    /**
     * 相册图片删除
     */
    public function picDel()
    {
        $id = I('id');
        $model = D('pic');
        $res = $model->delete($id);
        $data = $model->find($id);
        if ($res){
            //删除本地图片
           unlink(UPLOAD.$data['pic_big']);
           unlink(UPLOAD.$data['pic_small']);
            $this->success('操作成功');
        }else{
            $this->error('操作失败');//添加失败不添加url 返回原页面
        }
    }
    /**
     * 商品的修改
     */
    public function update()
    {
        $id = I('id');
        $goodsModel = D('Goods');
        if (IS_POST){
            $data = I('post.');
            if ($_FILES['goods_image']['name'] != ''){
                $info = picUpload();
                //缩略图处理
                $images = new Image();
                //打开图片
                $images->open(UPLOAD.$info['goods_image']['savepath'].$info['goods_image']['savename']);
                //进行图片缩放
                $images->thumb(100,100)->save(UPLOAD.$info['goods_image']['savepath'].'thump_'.$info['goods_image']['savename']);

                //图片地址写入数据库
                $data['goods_bigpic'] = $info['goods_image']['savepath'].$info['goods_image']['savename'];
                //缩略图写入数据库
                $data['goods_smallpic'] = $info['goods_image']['savepath'].'thump_'.$info['goods_image']['savename'];
            }
//            dump($data);die;
            $res = $goodsModel->save($data);
            if ($res){
                $this->success('操作成功',U('Goods/showlist'));die;
            }else{
                $this->error('操作失败');//添加失败不添加url 返回原页面
            }

        }
        $data = $goodsModel->find($id);
        $this->assign('data',$data);
        //查询品牌
        $brandData = D('brand')->brandList();
        $this ->assign('brandData',$brandData);
        //获取商品类型数据
        $cate_data = D('Cate')->select();
        $this->assign('cate_data',$cate_data);
        $this->display();
    }
}