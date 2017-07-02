<?php
namespace Admin\Controller;



use Think\Controller;

class NewsController extends Controller
{
    /**
     * 新闻添加页面
     */

    function news_add()
    {
        if (IS_POST){
            $data = I('post.');
            $res = D('News')->add($data);
            if ($res){
                $this->success('添加成功',U('News/news_list'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }


    }
    /**
     * 新闻列表
     */
    public function news_list()
    {
        $data = D('News')->select();
        $this->assign('data',$data);
        $this->display();
    }

    }