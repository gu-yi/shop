<?php
//价格区间
function getPrice()
{
    $arr = array(
        '1-1000' =>'千元以下',
        '1000-2000'=>'1000-2000',
        '2000-3000'=>'2000-3000',
        '3000-4000'=>'3000-4000',
        '4000-5000'=>'4000-5000',
        '6000-7000'=>'6000-6000',
        '7000-7000000'=>'7000以上',
    );
    return $arr;
}
//邮寄方式
function getTatus($key=1)
{//1.圆通，2.申通,3,城际快运，6邮政
    $array = array(
        1=>'圆通快递',
        2=>'申通快递',
        3=>'城际快运',
        6=>'邮政平邮'
    );
    return $array[$key];
}
//支付方式
function getPayTatus($key=1){
    //支付方式，1.余额，2.支付宝，3.微信，4银行转账
    $array = array(
        1=>'余额支付',
        2=>'支付宝支付',
        3=>'微信支付',
        4=>'银行转账'
    );
    return $array[$key];
}

function getWeather(){
    //接口地址
    $url = 'http://api.map.baidu.com/telematics/v2/weather?location=%E4%B8%8A%E6%B5%B7&ak=B8aced94da0b345579f481a1294c9094';
    //获取节后数据
    $data = file_get_contents($url);
    //$data = json_encode($data);
    //将字符串转换成对象
   $data = simplexml_load_string($data);
    //dump($data);die;
    $arr['cheng']=(string)$data->currentCity;
    $arr['ri']=(string)$data->results->result[0]->date;
    $arr['tian']=(string)$data->results->result[0]->weather;
    $arr['feng']=(string)$data->results->result[0]->wind;
    $arr['wen']=(string)$data->results->result[0]->temperature;
    $arr['bai']=(string)$data->results->result[0]->dayPictureUrl;
    $arr['ye']=(string)$data->results->result[0]->nightPictureUrl;
    /*foreach ($data->results->result as $key=>$value){
       var_dump($value) .'<br>';
    }*/
    //dump($arr);die;
   return $arr;

}

//获取浏览记录数据
function get_history(){
//获取浏览记录
    if (!empty(cookie('history'))){
        //取得COOKIE里的数据 ,
        $history = cookie('history') ;
        //dump($history);die;
        //写SQL语句，用IN 来查询出这些ID的商品列表
        //$sql_history = "SELECT * FROM `goods` WHERE `goods_id` in ({$history})";
        //执行SQL语句，返回数据列表
        $goods_history = D('Goods')->where('id in ('.$history.')')->select();
        return $goods_history;
    }else{
        return '';
    }

}
