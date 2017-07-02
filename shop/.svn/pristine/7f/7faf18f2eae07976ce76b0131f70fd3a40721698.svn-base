<?php
/**
 * User: yuqing
 * Date: 2017/6/24
 * Time: 15:51
 */
namespace Home\Controller;

use Think\Controller;
use Think\Verify;


class CommentController extends Controller{
    /**
     *添加评论
     */
    function comment_add()
    {
        if (!session('?username')){
          $this->error('请登录后操作');die;
        }
        $model = D('Comment');
        $data = $model->create();
        $yzm = I('captcha');
        $verify = new Verify();
        if ($verify->check($yzm)) {
            if (!$data) {
                $this->error($model->getError());
            }
            $res = $model->add();
            if ($res){
                $this->success('评论成功');
            }else{
                $this->error('评论失败');
            }
        }else{
            $this->error('验证码有误');
        }
    }


}