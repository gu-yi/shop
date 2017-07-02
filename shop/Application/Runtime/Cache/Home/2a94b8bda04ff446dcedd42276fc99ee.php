<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="Generator" content="YONGDA v1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="Keywords" content="YONGDA商城" />
        <meta name="Description" content="YONGDA商城" />
        
        <title>YONGDA商城 - Powered by YongDa</title>
        
        <link href="/Public/Home/CSS/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Public/Admin/js/jquery-1.7.2.js"></script>
        
    </head>
    <body class="index_body">
        <div class="block clearfix" style="position: relative; height: 98px;">
            <a href="#" name="top"><img class="logo" src="/Public/Home/images/logo.gif"></a>

            <div id="topNav" class="clearfix">
                <div style="float: left;">
                    <?php if(session('?username')): ?><font id="ECS_MEMBERZONE">
                            <div id="append_parent"></div>

                            <font class="f4_b"><?php echo (session('username')); ?> </font>, 欢迎您回来！IP:<?php echo ($_SESSION['userip']['ip']); ?>&nbsp;登录地址：<?php echo ($_SESSION['userip']['country']); ?>-><?php echo ($_SESSION['userip']['area']); ?>
                            <a href="<?php echo U('User/user_list');?>">用户中心</a>
                            <a href="<?php echo U('login/login_out');?>">退出</a>

                        </font>
                        <?php else: ?>
                        <font id="ECS_MEMBERZONE">
                        <div id="append_parent"></div>
                        欢迎光临本店&nbsp;
                        <a href="<?php echo U('Login/login');?>"> 登录</a>
                        <a href="<?php echo U('Login/reg');?>">注册</a>
                    </font><?php endif; ?>
                </div>
                <div style="float: right;">
                    <a href="<?php echo U('Cart/cart_list');?>">查看购物车</a>
                    |
                    <a href="#">选购中心</a>
                    |
                    <a href="#">标签云</a>
                    |
                    <a href="#">报价单</a>
                </div>
                </div>
          <div style="float: right;">
                今日天气：<?php echo ($_SESSION['weather']['ri']); ?>
                白天：<img src="<?php echo ($_SESSION['weather']['bai']); ?>" alt=""/>
                夜里：<img src="<?php echo ($_SESSION['weather']['ye']); ?>" alt=""/>

            </div>





            <div id="mainNav" class="clearfix">
                <a href="<?php echo U('Index/index');?>" >首页<span></span></a>
                <a href="<?php echo U('Goods/goods_list');?>">手机<span></span></a>
                <a href="#">电脑<span></span></a>
                <a href="#">手机配件<span></span></a>
                <a href="javascript:void(0)">美食<span></span></a>
                <a href="#">留言板<span></span></a>
            </div>
        </div>

        <div class="header_bg">
            <div style="float: left; font-size: 14px; color:white; padding-left: 15px;">
            </div>  

            <form id="searchForm" method="get" action="#">
                <input name="keywords" id="keyword" type="text" />
                <input name="imageField" value=" " class="go" style="cursor: pointer; background: url('/Public/Home/images/sousuo.gif') no-repeat scroll 0% 0% transparent; width: 39px; height: 20px; border: medium none; float: left; margin-right: 15px; vertical-align: middle;" type="submit" />

            </form>
        </div>
        <div class="blank5"></div>
        <div class="header_bg_b">
            <div class="f_l" style="padding-left: 10px;">
                <img src="/Public/Home/images/biao6.gif" />
                    北京市区，现在下单(截至次日00:30已出库)，<b>明天上午(9-14点)</b>送达 <b>免运费火热进行中！</b>
            </div>
            <div class="f_r" style="padding-right: 10px;">
                <img style="vertical-align: middle;" src="/Public/Home/images/biao3.gif">
                    <span class="cart" id="ECS_CARTINFO">
                        <a href="#" title="查看购物车">您的购物车中有<span class="good_num"><?php if($_SESSION['num']== null): ?>0 <?php else: ?> <?php echo (session('num')); endif; ?></span> 件商品，总计金额 ￥<span class="totals"><?php if($_SESSION['totals']== null): ?>0<?php else: echo (session('totals')); endif; ?></span>元。</a></span>
                    <a href="<?php echo U('Cart/cart_list');?>"><img style="vertical-align: middle;" src="/Public/Home/images/biao7.gif"></a>

            </div>
        </div>
		
		
		<!--<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>-->
<script src="/Public/Home/js/jquery-1.7.2.js"></script>

<script type="text/javascript" src="/Public/Home/js/jR3DCarousel.min.js"></script>


<style>
    body { margin: 0; font: 13px/1.5 "Microsoft YaHei", "Helvetica Neue", "Sans-Serif"; min-height: 960px; min-width: 600px; }
    .my-map { margin: 0 auto; width: 200px; height: 200px; }
    .my-map .icon { background: url(http://lbs.amap.com/console/public/show/marker.png) no-repeat; }
    .my-map .icon-cir { height: 31px; width: 28px; }
    .my-map .icon-cir-red { background-position: -11px -5px; }
    .amap-container{height: 100%;}
    .boxCenterList form{display:inline;}
    .boxCenterList form a{color:#404040; text-decoration:underline;}
</style>
<div class="blank"></div>
        <div class="block box">

        <div class="block clearfix">

            <div class="AreaL">

                <h3><span>商品分类</span></h3> 
                <div id="category_tree" class="box_1">

                    <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
                        <dt><a href="#"><?php echo ($vo["cate_name"]); ?></a></dt>

                        <dd>
                            <?php if(is_array($vo['brand_name'])): $i = 0; $__LIST__ = $vo['brand_name'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><a href="#"><?php echo ($voo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </dd>

                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
                <div class="blank"></div>
                <div class="box">
                    <h3><span>销售排行榜</span></h3> 
                    <div class="box_1">
                        <div class="top10List clearfix">
                            <?php if(is_array($click_data)): $i = 0; $__LIST__ = $click_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="clearfix">
                                <img src="/Public/Home/images/top_<?php echo ($key+1); ?>.gif" class="iteration">
                                    <li class="topimg">
                                        <a href="#"><img src="/Uploads/<?php echo ($vo["goods_smallpic"]); ?>" alt="" class="samllimg"></a>
                                    </li>

                                    <li class="iteration1">
                                        <a href="#" title=""><?php echo ($vo["goods_name"]); ?></a><br />
                                        本店售价：<font class="f1">￥<?php echo ($vo["goods_price"]); ?>元</font><br />
                                    </li>
                            </ul><?php endforeach; endif; else: echo "" ;endif; ?>


                        </div>
                    </div>
                </div>
                <div class="blank5"></div><div class="box">  <h3><span>品牌专区</span></h3>
                    <div class="box_1">
                        <div class=" brands clearfix">
                            <a href="#"><img src="/Public/Home/images/1240803062307572427.gif" alt="诺基亚 (7)"></a>
                            <a href="#"><img src="/Public/Home/images/1240802922410634065.gif" alt="摩托罗拉 (1)"></a>
                            <a href="#"><img src="/Public/Home/images/1240803144788047486.gif" alt="多普达 (1)"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="AreaM">
                <div class="box clearfix jR3DCarouselGallery">

                </div>
                <div class="blank"></div>

                <div class="itemTit" id="itemHot">
                    <div class="tit">热卖商品</div>
                    <h2><a href="#" >全部商品</a></h2>
                    <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2 class="h2bg"><a href="#" ><?php echo ($vo["cate_name"]); ?></a></h2><?php endforeach; endif; else: echo "" ;endif; ?>
                  <!--  <h2 class="h2bg"><a href="#" >双模手机</a></h2>
                    <h2 class="h2bg"><a href="#" >充值卡</a></h2>
                    <h2 class="h2bg"><a href="#" >小灵通/固话充值卡</a></h2>
                    <h2 class="h2bg"><a href="#" >移动手机充值卡</a></h2>-->
                </div>
                <div id="show_hot_area" class="clearfix">

                    <?php if(is_array($click_data)): $i = 0; $__LIST__ = array_slice($click_data,3,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="goodsItem">

                        <a href="#"><img src="/Uploads/<?php echo ($vo["goods_smallpic"]); ?>" alt="<?php echo ($vo["goods_name"]); ?>" class="goodsimg"></a><br />
                        <p class="f1"><a href="#" title="<?php echo ($vo["goods_name"]); ?>"><?php echo ($vo["goods_name"]); ?></a></p>
                        <font class="market">￥<?php echo ($vo["goods_mprice"]); ?>元</font><br />
                        <font class="f1">
                            ￥<?php echo ($vo["goods_price"]); ?>元                     </font>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="blank"></div>

                <div class="itemTit" id="itemBest">

                    <div class="tit">精品推荐</div>
                    <h2><a href="#" >全部商品</a></h2>
                    <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2 class="h2bg"><a href="#" ><?php echo ($vo["cate_name"]); ?></a></h2><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!--<h2 class="h2bg"><a href="#" >GSM手机</a></h2>
                    <h2 class="h2bg"><a href="#" >双模手机</a></h2>
                    <h2 class="h2bg"><a href="#" >充值卡</a></h2>
                    <h2 class="h2bg"><a href="#" >联通手机充值卡</a></h2>-->
                </div>
                <div id="show_best_area" class="clearfix">
                    <?php if(is_array($time_data)): $i = 0; $__LIST__ = array_slice($time_data,3,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="goodsItem">

                        <a href="#"><img src="/Uploads/<?php echo ($vo["goods_smallpic"]); ?>" alt="<?php echo ($vo["goods_name"]); ?>" class="goodsimg"></a><br />
                        <p class="f1"><a href="#" title="<?php echo ($vo["goods_name"]); ?>"><?php echo ($vo["goods_name"]); ?></a></p>


                        <font class="market">￥<?php echo ($vo["goods_mprice"]); ?>元</font><br />

                        <font class="f1">
                            ￥<?php echo ($vo["goods_price"]); ?>元                     </font>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="blank"></div>

                <div class="itemTit" id="itemNew">
                    <div class="tit">新品上架</div>
                    <h2><a href="#" >全部商品</a></h2>
                    <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2 class="h2bg"><a href="#" ><?php echo ($vo["cate_name"]); ?></a></h2><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!--<h2 class="h2bg"><a href="#" >GSM手机</a></h2>
                    <h2 class="h2bg"><a href="#" >双模手机</a></h2>
                    <h2 class="h2bg"><a href="#" >充值卡</a></h2>
                    <h2 class="h2bg"><a href="#" >移动手机充值卡</a></h2>
                    <h2 class="h2bg"><a href="#" >联通手机充值卡</a></h2>-->
                </div>
                <div id="show_new_area" class="clearfix">
                    <?php if(is_array($time_data)): $i = 0; $__LIST__ = array_slice($time_data,1,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="goodsItem">

                        <a href="#"><img src="/Uploads/<?php echo ($vo["goods_smallpic"]); ?>" alt="{<?php echo ($vo["goods_name"]); ?>}" class="goodsimg"></a><br />
                        <p class="f1"><a href="#" title="{<?php echo ($vo["goods_name"]); ?>}">{<?php echo ($vo["goods_name"]); ?>}</a></p>
                        <font class="market">￥{<?php echo ($vo["goods_mprice"]); ?>}元</font><br />
                        <font class="f1">
                            ￥{<?php echo ($vo["goods_price"]); ?>}元                     </font>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


                </div>
                <div class="blank"></div>

            </div>


            <div class="AreaL" style="float: right;">

                <h3><span>新闻快讯</span></h3> 
                <div class="NewsList tc box_1" style="border-top: medium none;">
                    <ul>



                        <?php if(is_array($data)): $i = 0; $__LIST__ = array_slice($data,1,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="#" title="三星SGHU308说明书下载"><?php echo ($vo["title"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>




                    </ul>
                </div>

                <div class="blank"></div>
                <div class="box">
                    <h3><span>订单查询</span></h3>
                    <div class="box_1">
                        <div class="boxCenterList">
                            <form name="ecsOrderQuery">
                                <input name="order_sn" class="inputBg" type="text" placeholder="请输入您的单号"/><br />
                                <div class="blank5"></div>
                                <input value="查询该订单号" class="bnt_blue_2"  type="button" />
                            </form>
                            <div id="ECS_ORDER_QUERY" style="margin-top: 8px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blank"></div>
                <div class="blank"></div><div class="box">
                    <h3><span>邮件订阅</span></h3>
                    <div class="box_1">

                        <div class="boxCenterList RelaArticle">
                            <input id="user_email" class="inputBg" type="text" /><br />
                            <div class="blank5"></div>
                            <input class="bnt_blue" value="订阅"  type="button" />
                            <input class="bnt_bonus" value="退订"  type="button" />
                        </div>
                    </div>
                </div>
                <div class="blank"></div>
                <div class="box"> 
                    <h3>
                        <span><a href=""></a></span>
                        <a href="">更多</a>
                    </h3>
                    <div class="box_1">

                        <div class="boxCenterList RelaArticle">
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>

                <div class="box">
                    <h3><span>快递查询</span></h3>
                    <div class="box_1">
                        <div class="boxCenterList">

                            <!--订单号 <input type="text" placeholder="输入订单号"><br />-->
                             <select name="type" id="type"><option value="0">快递公司</option><option value="jd">京东</option><option value="yuantong">圆通</option></select><input type="text" placeholder="输入快递单号" id="number" name="number">   <div class="blank"></div>
                            <div id="expdiv"></div>
                            <input type="button" value="提交查询" id="exp">
                            <!--<iframe name="kuaidi100" src="https://www.kuaidi100.com/frame/app/index.html?canvas_pos=600" width="200" height="100" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>-->

                        </div>
                    </div>
                </div>
                <div class="blank"></div>
                <div class="box">
                    <h3><span>手机归属地查询</span></h3>
                    <div class="box_1">
                        <div class="boxCenterList">
                            <form name="ecsOrderQuery">
                                <input name="order_sn" class="inputBg" id='guishu' type="text" placeholder="请输入手机号"/><br />
                                <div class="blank5"></div>
                                <div id="div11" style="color: #0000CC"></div>
                                <input value="查询" class="bnt_blue_2" id="btnhao" type="button" />
                            </form>

                            </div>
                        </div>
                </div>


                <div class="blank"></div>
                <div class="box">
                    <iframe width='200' height='200' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='http://f.amap.com/46Zox_0C52V28'></iframe>

                </div>
            </div>
        </div>





        <div class="blank"></div>
<script type="text/javascript">
    $(function () {
        $(".jR3DCarouselGallery").jR3DCarousel({
            "width": 440,
            "height": 222,
            "slideLayout": "fill",
            "animation": "slide3D",
            "animationCurve": "ease",
            "animationDuration": 700,
            "animationInterval": 1000,
            "autoplay": false,
            "navigation": "circles",
//            "slides": [
//                {
//                    "src": "/Public/Home/images/111.jpg"
//                },
//                {
//                    "src": "/Public/Home/images/222.jpg"
//                },
//                {
//                    "src": "/Public/Home/images/333.jpg"
//                },
//                {
//                    "src": "/Public/Home/images/a1.jpg"
//                },
//                {
//                    "src": "/Public/Home/images/a2.jpg"
//                },
//                {
//                    "src": "/Public/Home/images/a3.jpg"
//                }
//
//            ]
            "slides": [
                {
                    "src": "/Public/Home/images/i.jpg"
                },
                {
                    "src": "/Public/Home/images/h.jpg"
                },
                {
                    "src": "/Public/Home/images/g.jpg"
                },
                {
                    "src": "/Public/Home/images/a.jpg"
                },
                {
                    "src": "/Public/Home/images/b.jpg"
                },
                {
                    "src": "/Public/Home/images/e.jpg"
                },
                {
                    "src": "/Public/Home/images/f.jpg"
                },
                {
                    "src": "/Public/Home/images/g.jpg"
                }

            ]



        });

        $('#btnhao').click(function () {
            var tel = $('#guishu').val();
            $.post('<?php echo U("Index/getTel");?>',{'tel':tel},function (data) {
                var str =data.data.province+data.data.city+data.data.sp;
               $('#div11').text(str);
                console.log(data);
            },'json');
        });
        $('#exp').click(function () {
            var number = $('#number').val();
            var type = $('#type').val();
            $.post('<?php echo U("Api/get_exp");?>',{'number':number,'type':type},function (data) {
               console.log(data);


               var str='';
               for (var i=0;i < data.data.length;i++){
                    str += '时间：'+data.data[i].ftime+'状态：'+data.data[i].context;'<br>'

               }
               $('#expdiv').text(str);

            },'json');
        });

    });

</script>



        
        
		
      



        
        <div class="block">
            <a href="#" target="_blank" title="YONGDA商城"><img alt="YONGDA商城" height="300" width="960" src="/Public/Home/images/dibu1.jpg"></a>
            <div class="blank"></div>
        </div>
        <div class="block">
            <div class="box">
                <div class="helpTitBg" style="clear: both;">
                    <dl>
                        <dt><a href="#" title="新手上路 ">新手上路 </a></dt>
                        <dd><a href="#" title="售后流程">售后流程</a></dd>
                        <dd><a href="#" title="购物流程">购物流程</a></dd>
                        <dd><a href="#" title="订购方式">订购方式</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="手机常识 ">手机常识 </a></dt>
                        <dd><a href="#" title="如何分辨原装电池">如何分辨原装电池</a></dd>
                        <dd><a href="#" title="如何分辨水货手机 ">如何分辨水货手机</a></dd>
                        <dd><a href="#" title="如何享受全国联保">如何享受全国联保</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="配送与支付 ">配送与支付 </a></dt>
                        <dd><a href="#" title="货到付款区域">货到付款区域</a></dd>
                        <dd><a href="#" title="配送支付智能查询 ">配送支付智能查询</a></dd>
                        <dd><a href="#" title="支付方式说明">支付方式说明</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="会员中心">会员中心</a></dt>
                        <dd><a href="#" title="资金管理">资金管理</a></dd>
                        <dd><a href="#" title="我的收藏">我的收藏</a></dd>
                        <dd><a href="#" title="我的订单">我的订单</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="服务保证 ">服务保证 </a></dt>
                        <dd><a href="#" title="退换货原则">退换货原则</a></dd>
                        <dd><a href="#" title="售后服务保证 ">售后服务保证</a></dd>
                        <dd><a href="#" title="产品质量保证 ">产品质量保证</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="联系我们 ">联系我们 </a></dt>
                        <dd><a href="#" title="网站故障报告">网站故障报告</a></dd>
                        <dd><a href="#" title="选机咨询 ">选机咨询</a></dd>
                        <dd><a href="#" title="投诉与建议 ">投诉与建议</a></dd>
                    </dl>
                </div>
            </div>


        </div>
        <div class="blank"></div>
       <!-- <div id="bottomNav" class="box block">
            <div class="box_1">
                <div class="links clearfix"> 
                    <a href="#" target="_blank" title="YONGDA商城"><img src="/Public/Home/images/logo.gif" alt="YONGDA商城" border="0"></a>

                    <a href="#" target="_blank" title="YONGDA 网上商店管理系统">
                        <img src="/Public/Home/images/linklogo.gif" alt="YONGDA 网上商店管理系统" border="0" />
                    </a>


                    [<a href="#" target="_blank" title="免费申请网店">免费申请网店</a>]
                    [<a href="#" target="_blank" title="免费开独立网店">免费开独立网店</a>]


                    [<a href="#" target="_blank" title="免费开独立网店">yongda商城</a>]
                </div>
            </div>
        </div>-->
        <div class="blank"></div>
        <div id="bottomNav" class="box block">
            <div class="bNavList clearfix">
                <a href="#">免责条款</a>
                |
                <a href="#">隐私保护</a>
                |
                <a href="#">咨询热点</a>
                |
                <a href="#">联系我们</a>
                |
                <a href="#">Powered&nbsp;by&nbsp;<strong><span style="color: rgb(51, 102, 255);">YongDa</span></strong></a>
                |
                <a href="#">批发方案</a>
                |
                <a href="#">配送方式</a>

            </div>
        </div>

        <div id="footer">
            <div class="text">
                © 2012-2020 YONGDA 版权所有，并保留所有权利。<br />
            </div>
        </div>
    </body>
<script type="text/javascript" >
    $(function () {
        var obj =  $('#mainNav a');
        //obj.removeClass('cur');
        obj.each(function () {
           //$(this).addClass('cur');
            $(this).click(function () {
               obj.removeClass('cur');
                //obj.attr('class','');
               $(this).addClass('cur');
            })

       })
    })
</script>
</html>