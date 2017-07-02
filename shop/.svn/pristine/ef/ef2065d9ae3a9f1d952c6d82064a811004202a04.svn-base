<?php
return array(
	//'配置项'=>'配置值'
    'URL_MODEL'=>2,
    'COOKIE_PREFIX'         =>  'home_',      // Cookie前缀 避免冲突
	//'TMPL_LAYOUT_ITEM'      =>  '{__CONTENT__}', // 布局模板的内容替换标识
    'LAYOUT_ON'             =>  true, // 是否启用布局
    'LAYOUT_NAME'           =>  'public', // 当前布局名称 默认为layout
    /*
    *支付宝配置文件
    */
    'PAY_ALIPAY'        => array(
        'partner'       => 'PID',
//收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
        'seller_id'     => 'PID',

// MD5密钥，安全检验码，由数字和字母组成的32位字符串，查看地址：https://b.alipay.com/order/pidAndKey.htm
        'key'           => 'key',

// 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
        'notify_url'    => "http://www.tp.com/ThinkPHP/Library/Vendor/alipay/notify_url.php",

// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
        'return_url'    => "http://www.tp.com/ThinkPHP/Library/Vendor/alipay/return_url.php",

//签名方式
        'sign_type'     => strtoupper('MD5'),

//字符编码格式 目前支持 gbk 或 utf-8
        'input_charset' => strtolower('utf-8'),

//ca证书路径地址，用于curl中ssl校验
        //请保证cacert.pem文件在当前文件夹目录中
        'cacert'        => VENDOR_PATH . 'cacert.pem',

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        'transport'     => 'http',
        'payment_type'  => "1",
        'service'       => "create_direct_pay_by_user",

    ),


);