<?php
//防止xss攻击封装函数
function cleanData($str)
{
//引入文件
    Vendor('htmlpurifier.library.HTMLPurifier#auto');
    //获取默认配置
    $config = \HTMLPurifier_Config::createDefault();
    //根据配置来设置
    $purifier = new \HTMLPurifier($config);
    //过滤字符串
    $cleanData = $purifier->purify($str);
    //返回过滤后的字符串
    return $cleanData;
}
//图片上传操作
function picUpload(){
    //配置参数
    $config = array(
        'maxSize'    =>    3145728,
        'rootPath'   =>    UPLOAD,
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
    );
    //实例化上传文件类
    $upload = new \Think\Upload($config);
    $info = $upload->upload();
    if (!$info){
        echo $upload->getError();die;
    }
    return $info;
}

#递归方法实现无限极分类
function getTree($list,$pid=0,$level=0) {
    static $tree = array();
    foreach($list as $row) {
        if($row['pid']==$pid) {
            $row['level'] = $level;
            $tree[] = $row;
            getTree($list, $row['id'], $level + 1);
        }
    }
    return $tree;
}

/**
 * 获取菜单是否显示
 * @param int $key 传入的参数数组下标
 * @return mixed 返回数组的值
 */
function getMenuStatus($key=0)
{
    $array = array(
        1=>'是',
        0=>'否'
    );
    return $array[$key];
}

/**
 * 发送模板短信
 * @param to 手机号码集合,用英文逗号分开
 * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
 * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
 */
function sendTemplateSMS($to,$datas,$tempId)
{

    // 初始化REST SDK
    vendor('sendMsg.CCPRestSmsSDK');
    $msg_config = C('SEND_MSG');
   $accountSid = $msg_config['accountSid'];
    $accountToken = $msg_config['accountToken'];
    $appId = $msg_config['appId'];
    $serverIP = $msg_config['serverIP'];
    $serverPort = $msg_config['serverPort'];
    $softVersion = $msg_config['softVersion'];
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);

    // 发送模板短信
   //echo "Sending TemplateSMS to $to <br/>";
    $result = $rest->sendTemplateSMS($to,$datas,$tempId);
    if($result == NULL ) {
        echo "result error!";
        break;
    }
    if($result->statusCode!=0) {
        $arr = array('code'=>$result->statusCode,'msg'=>$result->statusMsg);
        //echo "error code :" . $result->statusCode . "<br>";
        //echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
    }else{
        //echo "Sendind TemplateSMS success!<br/>";
        // 获取返回信息
        //$smsmessage = $result->TemplateSMS;
        //echo "dateCreated:".$smsmessage->dateCreated."<br/>";
        //echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
        //TODO 添加成功处理逻辑
        $arr = array('code'=>0,'msg'=>'发送成功');
    }
    return $arr;
}

//Demo调用
//**************************************举例说明***********************************************************************
//*假设您用测试Demo的APP ID，则需使用默认模板ID 1，发送手机号是13800000000，传入参数为6532和5，则调用方式为           *
//*result = sendTemplateSMS("13800000000" ,array('6532','5'),"1");																		  *
//*则13800000000手机号收到的短信内容是：【云通讯】您使用的是云通讯短信模板，您的验证码是6532，请于5分钟内正确输入     *
//*********************************************************************************************************************
//sendTemplateSMS("18866201750",array('天干勿操；小心火烛','3'),"1");//手机号码，替换内容数组，模板ID

/*发送邮件方法
 *@param $to：接收者 $title：标题 $content：邮件内容
 *@return bool true:发送成功 false:发送失败
 */

function sendMail($to, $title, $content)
{

    //引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
    vendor('sendMail.PHPMailerAutoload');
    //实例化PHPMailer核心类
    $mail = new PHPMailer();

    //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    //$mail->SMTPDebug = 1;

    //使用smtp鉴权方式发送邮件
    $mail->isSMTP();

    //smtp需要鉴权 这个必须是true
    $mail->SMTPAuth = true;

    //链接qq域名邮箱的服务器地址
    $mail->Host = 'smtp.126.com';

    //设置使用ssl加密方式登录鉴权
    $mail->SMTPSecure = 'ssl';

    //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
    $mail->Port = 465;

    //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
    $mail->CharSet = 'UTF-8';

    //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = 'yuyu发送邮件';

    //smtp登录的账号 这里填入字符串格式的qq号即可
    $mail->Username = 'yudiqing@126.com';

    //smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）
    $mail->Password = 'yuqing891225';

    //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
    $mail->From = 'yudiqing@126.com';

    //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
    $mail->isHTML(true);

    //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
    $mail->addAddress($to, 'yy');

    //添加多个收件人 则多次调用方法即可
    // $mail->addAddress('xxx@163.com','lsgo在线通知');

    //添加该邮件的主题
    $mail->Subject = $title;

    //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
    $mail->Body = $content;

    //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
    // $mail->addAttachment('./d.jpg','mm.jpg');
    //同样该方法可以多次调用 上传多个附件
    // $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');

    $status = $mail->send();

    //简单的判断与提示信息
    if ($status) {
        return true;
    } else {
        return false;
    }
}
