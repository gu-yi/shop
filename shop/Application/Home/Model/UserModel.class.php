<?php
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    //密码 添加时间通过回调函数处理
    protected function _before_insert(&$data,$options)
    {
            $data['user_addtime'] = time();
            $data['user_password'] = md5($data['user_password']);

    }
    //验证规则
    protected $_validate = array(
        array('captcha','require','验证码必须！'), //默认情况下用正则进行验证
        array('user_name','require','用户名不能为空！'),//用户名不能为空
        array('user_name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
         array('password2','user_password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
        array('user_email','email','邮箱不正确'),
        //array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
    );
}