<?php
return array(
	//'配置项'=>'配置值'
    'URL_MODEL'=>2,
    'TMPL_PARSE_STRING' => array(
        '__HOME__' => __ROOT__.'/Public/Home/',
        '__ADMIN__' => __ROOT__.'/Public/Admin/',
        '__UPLOAD__'=> __ROOT__.'/Uploads/'
    ),
    //'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    //链接数据库
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'shop',      // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'yuqing',    // 密码
    'DB_PORT'               =>  '3306',      // 端口
    'DB_PREFIX'             =>  'tp_',       // 数据库表前缀
    //显示跟踪信息
    'SHOW_PAGE_TRACE'      =>true,           //默认为false
    'LOAD_EXT_FILE'        => 'treeList',     //加载公共函数库文件
//短息发送配置
    'SEND_MSG'=>array(
        //主帐号,对应开官网发者主账号下的 ACCOUNT SID
        'accountSid'=> '8a216da85c62c9ad015c973499dd12a9',
        //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        'accountToken' => '8b036592428448588a193c8a1f1666cc',
        //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
        //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        'appId'=>'8a216da85c62c9ad015c97349b2712b0',
        //请求地址
        //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
        //生产环境（用户应用上线使用）：app.cloopen.com
        'serverIP'=>'sandboxapp.cloopen.com',
        //请求端口，生产环境和沙盒环境一致
        'serverPort'=>'8883',
        //REST版本号，在官网文档REST介绍中获得。
        'softVersion'=>'2013-12-26',

        ),
);