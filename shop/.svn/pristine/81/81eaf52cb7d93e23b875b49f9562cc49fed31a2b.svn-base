<?php
namespace Home\Model;

use Think\Model;

class CommentModel extends Model
{
    //密码 添加时间通过回调函数处理
    protected function _before_insert(&$data,$options)
    {
            $data['com_addtime'] = time();
            $data['com_username'] = session('username');

    }
    //验证规则
    protected $_validate = array(
        array('captcha','require','验证码必须！'), //默认情况下用正则进行验证
        array('com_comtent','require','用户名不能为空！'),//用户名不能为空
        array('com_email','email','邮箱格式不正确'),
    );
}