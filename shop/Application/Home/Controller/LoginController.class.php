<?php
namespace Home\Controller;

use Org\Net\IpLocation;
use Think\Controller;
use Think\Verify;

class LoginController extends Controller
{
    //登录首页
    public function login()
    {
        //天气信息保存进session
        $arr = getWeather();
        session('weather',$arr);
        if (IS_POST){

            $data =I('post.');

            $res = D('User')->where(array('user_name'=>$data['username'],'user_password'=>md5($data['password'])))->find();
            if ($res){
                //判断是否激活
                $rs = D('User')->where(array('user_name'=>$data['username'],'email_status'=>1))->find();
                if (!$rs){$this->error('请激活后登录');}
                //获取IP地址
                $ip = get_client_ip();
                //初始化ip地址类 指定ip数据库文件
                $ipObj = new IpLocation('qqwry.dat');
                //根据IP来获取位置信息
                $ipData = $ipObj->getlocation($ip);
               //区域转码
                $ipData['area']= iconv('GB2312','UTF-8',$ipData['area']);
                $ipData['country']= iconv('GB2312','UTF-8',$ipData['country']);
                //登录信息保存进session
                session('userip',$ipData);
                session('username',$res['user_name']);
                session('user_id',$res['id']);
                //天气信息保存进session
                session('weather',getWeather());
                //若勾选保存用户信息则保存
                if ($data['remember']==1){
                  cookie('username',$res['user_name']);

                }
                //最后登录时间
                $time = time();
                if ($res['user_lasttime']==''){

                    D('User')->where(array('id'=>$res['id']))->save(array('user_lasttime'=>$time));
                    session('lasttime',$time);
                }else{
                    $model = D('User');
                    $data = $model->find(session('user_id'));
                    $time = $data['user_lasttime'];
                    session('lasttime',$time);
                    $model->save(array('user_lasttime'=>$time,'id'=>session('user_id')));

                }

               $this->success('登录成功',U('User/user_list'));
                //$this->success('登录成功',U('Index/index'));
            }else{
                $this->error('用户名或者密码错误');
            }
        }

        $this->display();
    }
    /**
     * 登录账户激活
     */
    public function active()
    {
        $user_id = I('uid');
        $email_code = I('code');
        $data = D('User')->where(array('id'=>$user_id,'email_code'=>$email_code))->find();
        if ($data){
           $res = D('User')->where('id='.$user_id)->save(array('email_status'=>1));
           if($res){
            $this->success('激活成功',U('login'));
           }
        }else{
            $this->error('激活失败');
        }
    }
    /**
     * 退出登录
     */
    public function login_out()
    {
        session(null);
        if(!session('?username')){
            $this->success('退出成功',U('Login/login'));
        }
    }
    //会员注册页
    public function reg()
    {
        if (IS_POST){

            $model = D('User');
            $yzm = I('captcha');
            $code = I('code');
            $data = $model->create();

            $verify = new Verify();
            if ($verify->check($yzm)) {

                if (!$data) {
                    $this->error($model->getError());
                }
                if ($code != session('code')){
                    $this->error('短信验证码有误请重新获取');
                }

                $data['email_code'] = md5(time().rand(0,9999).$data['user_name']);
                $res = $model->add($data);
                if ($res) {
                   //发送邮件
                    $to = $data['user_email'];
                    $title = '激活邮件';
                    $content = $data['user_name'].'欢迎注册<a href="http://www.tp.com/shop/home/login/active/uid/'.$res.'/code/'.$data['email_code'].'">点击激活</a>';
                    sendMail($to,$title,$content);
                    $this->success('注册成功!请激活后登录', U('login'),3);
                    die;
                } else {
                    $this->error('注册失败');
                }
            }else{
                $this->error('验证码有误');
            }
        }


        $this->display();
    }
    //验证码
    public function verify(){
        $config =	array(
            'useImgBg'  =>  true,           // 使用背景图片
            'fontSize'  =>  13,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'imageH'    =>  23,               // 验证码图片高度
            'imageW'    =>  100,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '6.ttf',              // 验证码字体，不设置随机获取
        );
        $verify = new Verify($config);
        $verify->entry();

    }

    //短信验证码处理
    function sendMsg(){
        $phone = I('phone');
        $code  = rand(1000,9999);
        session('code',$code);
        //发送验证码
        $res = sendTemplateSMS($phone,array($code,5),'1');
        if ($res['code'] == 0){
            $this->success($res['msg']);
        }else{
            $this->error('系统繁忙');
        }
    }
}