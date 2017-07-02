<?php
/**
 * User: yuqing
 * Date: 2017/6/12
 * Time: 10:12
 */

namespace Home\Controller;

use Think\Controller;
//接口处理
class ApiController extends Controller
{
    //物流接口
    function get_exp(){
      $data = I('post.');
      $type = $data['type'];
      $type = 'jd';//测试
      $number = $data['number'];
      $number = 'VC34438354672';//测试
      $url = 'https://www.kuaidi100.com/query?type='.$type.'&postid='.$number;
      $content = file_get_contents($url);
      echo $content;
    }
    //邮件发送
    /*发送邮件方法
 *@param $to：接收者 $title：标题 $content：邮件内容
 *@return bool true:发送成功 false:发送失败
 */

    function sendMail()
    {
        $to = '511830646@qq.com';
        $title = '511830646@qq.com';
        $content = '好了测试完成';
        //测试邮件发送 封装后
       $res = sendMail($to, $title, $content);
       if ($res){
           echo '发送成功';
       }else{
           echo '发送失败';
       }
    }

}