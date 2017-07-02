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
		
		
		
<script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/zzsc.css">
<script src="/Public/Home/layer/layer.js"></script>
<!--<script type="text/javascript" class="library" src="/Public/Home/js/jquery-1.7.2.js"></script>-->
<script type="text/javascript" class="library" src="/Public/Home/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" class="library" src="/Public/Home/js/zzsc.js"></script>
		
        <div class="block box">
            <div class="blank"></div>
            <div id="ur_here">
                当前位置: <a href="#">首页</a> <code>&gt;</code> <a href="#">手机类型</a> <code>&gt;</code> <a href="#">GSM手机</a> <code>&gt;</code> <?php echo ($data["goods_name"]); ?>
        </div>
        <div class="blank"></div>



        <div class="block clearfix">
            <div class="AreaL">
                <h3><span>商品分类</span></h3> 
                <div id="category_tree" class="box_1">
                    <dl>
                        <dt><a href="#">CDMA手机</a></dt>
                        <dd>       </dd>
                    </dl>
                    <dl>
                        <dt><a href="#">GSM手机</a></dt>
                        <dd>       </dd>
                    </dl>
                    <dl>
                        <dt><a href="#">3G手机</a></dt>
                        <dd>       </dd>
                    </dl>
                    <dl>
                        <dt><a href="#">双模手机</a></dt>
                        <dd>       </dd>
                    </dl>

                </div>
                <div class="blank"></div>

                <div style="display: block;" class="box" id="history_div">
                    <h3><span>浏览历史</span></h3>
                    <div class="box_1">

                        <div class="boxCenterList clearfix" id="history_list">
                            <?php if(is_array($goods_history)): $i = 0; $__LIST__ = $goods_history;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="clearfix">
                                <li class="goodsimg"><a href="#" target="_blank"><img src="/Uploads/<?php echo ($vo[goods_smallpic]); ?>" alt="<?php echo ($vo[goods_name]); ?>" class="B_blue"></a></li>
                                <li><a href="#" target="_blank" title="<?php echo ($vo[goods_name]); ?>"><?php echo ($vo[goods_name]); ?></a><br />本店售价：<font class="f1">￥<?php echo ($vo[goods_price]); ?>元</font><br /></li>
                            </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                            <ul id="clear_history"><a >[清空]</a></ul>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
            </div>

            <div class="AreaR">
                <div id="goodsInfo" class="clearfix">
                    <div class="imgInfo">

                         <div class="con-FangDa" id="fangdajing">
                        <div class="con-fangDaIMg">
                            <!-- 正常显示的图片-->
                    <img src="/Uploads/<?php echo ($data["goods_bigpic"]); ?>">
                    <!-- 滑块-->
                    <div class="magnifyingBegin"></div>
                    <!-- 放大镜显示的图片 -->
                    <div class="magnifyingShow"><img src="/Uploads/<?php echo ($data["goods_bigpic"]); ?>"></div>
                </div>

                <ul class="con-FangDa-ImgList">
                    <!-- 图片显示列表 -->
                    <?php if(is_array($pic_data)): $i = 0; $__LIST__ = $pic_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="active"><img src="/Uploads/<?php echo ($vo["pic_small"]); ?>" data-bigimg="/Uploads/<?php echo ($vo["pic_big"]); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
                    </div>





                    <div class="textInfo">
                            <div class="clearfix" style="font-size: 14px; font-weight: bold; padding-bottom: 8px;">
                                <?php echo ($data["goods_name"]); ?>
                            </div>
                            <ul>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品货号：</strong><?php echo ($data["goods_number"]); ?>
                                    </dd>
                                </li> 
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品库存：</strong>
                                        <?php echo ($data["goods_count"]); ?> 台
                                    </dd>
                                </li>  
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品品牌：</strong><a href="#"><?php echo ($data["brand_name"]); ?></a>
                                    </dd>
                                </li>  
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品重量：</strong><?php echo ($data["goods_weight"]); ?>克
                                    </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>上架时间：</strong><?php echo (date('Y-m-d',$data[goods_addtime])); ?>
                                    </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品点击数：</strong><?php echo ($data["goods_click"]); ?>  </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>市场价格：</strong><font class="market">￥<?php echo ($data["goods_mprice"]); ?>元</font><br />

                                        <strong>本店售价：</strong><font class="shop" id="ECS_SHOPPRICE">￥<?php echo ($data["goods_price"]); ?>元</font><br />
                                        <!--<strong>注册用户：</strong><font class="shop" id="ECS_RANKPRICE_1">￥2298元</font><br />-->
                                        <!--<strong>vip：</strong><font class="shop" id="ECS_RANKPRICE_2">￥2183元</font><br />-->
                                    </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>用户评价：</strong>
                                        <img src="/Public/Home/images/stars5.gif" alt="comment rank 5">
                                    </dd>
                                </li>

                               <!-- <li class="clearfix">
                                    <dd>
                                        <strong>商品总价：</strong><font id="ECS_GOODS_AMOUNT" class="shop">￥2298元</font>
                                    </dd>
                                </li>-->








                                <form action="" method="post" id="form_cart">
                                    <input type="hidden" name="goods_id" value="<?php echo ($data["id"]); ?>">
                                    <input type="hidden" name="goods_price" value="<?php echo ($data["goods_price"]); ?>">
                                <li class="clearfix">
                                    <dd>
                                        <strong>购买数量：</strong>
                                        <input name="number" id="number" value="1" size="4" onblur="changePrice()" style="border: 1px solid rgb(204, 204, 204);" type="text" />
                                    </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>购买此商品可使用：</strong><font class="f4">2200 积分</font>
                                    </dd>
                                </li>
                                <?php if(is_array($goods_attr)): $i = 0; $__LIST__ = $goods_attr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="padd loop">
                                    <strong><?php echo ($vo["attr_name"]); ?></strong>
                                    <?php if(is_array($vo[child])): $i = 0; $__LIST__ = $vo[child];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><label for="spec_value_227">
                                        <input name="goods_attr[<?php echo ($vo[attr_name]); ?>]" value="<?php echo ($voo); ?>" id="spec_value_227" <?php if($key == 0): ?>checked="checked"<?php endif; ?> onclick="changePrice()" type="radio" />
                                        <?php echo ($voo); ?>  </label><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <input name="spec_list" value="1" type="hidden" />
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>

                                </form>




                                <li class="padd">
                                    <a href="javascript:void(0)" id="buy"><img src="/Public/Home/images/goumai2.gif"></a>
                                    <a id="cart_add" href="javascript:void(0)"><img src="/Public/Home/images/shoucang2.gif"></a>
                                    <a href="#"><img src="/Public/Home/images/tuijian.gif"></a>
                                </li>



                            </ul>




                    </div>
                </div>
                <div class="blank"></div>
                <div class="box">
                    <div class="box_1">
                      <h3 style="padding: 0pt 5px;">
                            <div id="com_b" class="history clearfix">
                                <h2 style="cursor: pointer;">商品描述：</h2>
                                <h2 style="cursor: pointer;" class="h2bg">商品属性</h2>
                            </div>
                        </h3>
                        <div id="com_v" class="boxCenterList RelaArticle">
                            <!--<p>在机身材质方面，诺基亚E66大量采用金属材质，刨光的金属表面光泽动人，背面的点状效果规则却又不失变化，时尚感总是在不经意间诠释出来，并被人们所感知。E66机身尺寸为<span style="color:red;"><span style="font-size: larger;"><strong>107.5×49.5×13.6毫米，重量为121克</strong></span></span>，滑盖的造型竟然比E71还要轻一些。</p>
                            <p>&nbsp;</p>
                            <div>诺基亚E66机身正面是<span style="color:red;"><span style="font-size: larger;"><strong>一块2.4英寸1600万色QVGA分辨率（240×320像素）液晶显示屏</strong></span></span>。屏幕上方拥有光线感应元件，能够自适应周 围环境光调节屏幕亮度；屏幕下方是方向功能键区。打开滑盖，可以看到传统的数字键盘，按键的大小、手感、间隔以及键程适中，手感非常舒适。</div>
                            <div>&nbsp;</div>
                            <div>诺基亚为E66配备了一颗320万像素自动对焦摄像头，带有LED 闪光灯，支持多种拍照尺寸选择。</div>
                            <p>&nbsp;</p>   -->
                            <?php echo ($data["goods_introduce"]); ?>
                        </div>
                        <div class="none" id="com_h">
                            <blockquote>
<!--
                                <p>在机身材质方面，诺基亚E66大量采用金属材质，刨光的金属表面光泽动人，背面的点状效果规则却又不失变化，时尚感总是在不经意间诠释出来，并被人们所感知。E66机身尺寸为<span style="color:red;"><span style="font-size: larger;"><strong>107.5×49.5×13.6毫米，重量为121克</strong></span></span>，滑盖的造型竟然比E71还要轻一些。</p>
                                <p>&nbsp;</p>
                                <div>诺基亚E66机身正面是<span style="color:red;"><span style="font-size: larger;"><strong>一块2.4英寸1600万色QVGA分辨率（240×320像素）液晶显示屏</strong></span></span>。屏幕上方拥有光线感应元件，能够自适应周 围环境光调节屏幕亮度；屏幕下方是方向功能键区。打开滑盖，可以看到传统的数字键盘，按键的大小、手感、间隔以及键程适中，手感非常舒适。</div>
                                <div>&nbsp;</div>
                                <div>诺基亚为E66配备了一颗320万像素自动对焦摄像头，带有LED 闪光灯，支持多种拍照尺寸选择。</div>
-->

                            </blockquote>
                            <blockquote>
                                <table bgcolor="#dddddd" border="0" cellpadding="3" cellspacing="1" width="100%">
                                    <tbody><tr>
                                            <th colspan="2" bgcolor="#ffffff">商品属性</th>
                                        </tr>
                                        <tr>
                                            <td class="f1" align="left" bgcolor="#ffffff" width="30%">[外观样式]</td>
                                            <td align="left" bgcolor="#ffffff" width="70%">滑盖</td>
                                        </tr>
                                    </tbody></table>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="blank"></div>

                <div class="box">
                    <div class="box_1">
                        <h3><span class="text">商品标签</span></h3>
                        <div class="boxCenterList clearfix ie6">
                            <form name="tagForm"   id="tagForm">
                                <p id="ECS_TAGS" style="margin-bottom: 5px;">
                                </p>
                                <p>
                                    <input name="tag" id="tag" class="inputBg" size="35" type="text" />
                                    <input value="添 加" class="bnt_blue" style="border: medium none;" type="submit" />
                                    <input name="goods_id" value="9" type="hidden" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
                <div class="box">
                    <div class="box_1">
                        <h3><span class="text">购买过此商品的人还购买过</span></h3>
                        <div class="boxCenterList clearfix ie6">
                            <div class="goodsItem">
                                <a href="#">
                                    <img src="/Public/Home/images/24_thumb_G_1241971981429.jpg" alt="P806" class="goodsimg"></a><br />
                                <p><a href="#" title="P806">P806</a></p> 
                                <font class="shop_s">￥2000元</font>
                            </div>
                            <div class="goodsItem">
                                <a href="#">
                                    <img src="/Public/Home/images/22_thumb_G_1241971076803.jpg" alt="多普达Touch HD" class="goodsimg" /></a><br />
                                <p><a href="#" title="多普达Touch HD">多普达Touc...</a></p> 
                                <font class="shop_s">￥5999元</font>
                            </div>
                            <div class="goodsItem">
                                <a href="#">
                                    <img src="/Public/Home/images/13_thumb_G_1241968002527.jpg" alt="诺基亚5320 XpressMusic" class="goodsimg" /></a><br />
                                <p><a href="#" title="诺基亚5320 XpressMusic">诺基亚5320...</a></p> 
                                <font class="shop_s">￥1311元</font>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
                <div id="ECS_BOUGHT"><div class="box">
                        <div class="box_1">
                            <h3><span class="text">购买记录</span>(近期成交数量<font class="f1">0</font>)</h3>
                            <div class="boxCenterList">
                                还没有人购买过此商品               
                                <div id="buy_pagebar" class="f_r" style="margin-top: 10px;">
                                    <form name="selectPageForm" action="/goods.php" method="get">
                                        <div id="buy_pager">
                                            总计 0 个记录，共 1 页。 <span> <a href="#">第一页</a> <a href="#">上一页</a> <a href="#">下一页</a> <a href="#">最末页</a> </span>
                                        </div>
                                    </form>
                                </div>

                                <div class="blank5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="blank5"></div></div><div id="ECS_COMMENT"> <div class="box">
                        <div class="box_1">
                            <h3><span class="text">用户评论</span>(共<font class="f1"><?php echo ($count); ?></font>条评论)</h3>
                            <div class="boxCenterList clearfix" style="height: 1%;">
                                <?php if($count == 0): ?><ul class="comments">
                                    <li>暂时还没有任何用户评论</li>

                                </ul>
                                <?php else: ?>
                                    <?php if(is_array($com_data)): $i = 0; $__LIST__ = $com_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="cmt1" class="msg" style="margin-left:<?php echo ($vo[level]*50); ?>px">
                                    <div ><span style="font-size: 16px "><?php echo ($vo["com_username"]); ?></span>
                                         发布于<?php echo (date('Y-m-d H:i:s',$vo[com_addtime])); ?>&nbsp;&nbsp;
                                            <a onclick="getpid(<?php echo ($vo[id]); ?>)" href="#comment">回复</a>
                                        </div>
                                    <div class="msgarticle"><?php echo ($vo["com_content"]); ?></div>
                                </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>

                                <div id="pagebar" class="f_r">
                                    <form name="selectPageForm" action="/goods.php" method="get">
                                        <div id="pager">
                                            <?php echo ($show); ?>
                                        </div>
                                    </form>
                                </div>

                                <div class="blank5"></div>

                                <div class="commentsList">
                                    <form action="<?php echo U('Comment/comment_add');?>"  method="post" name="commentForm" id="commentForm">
                                        <table border="0" cellpadding="0" cellspacing="5" width="710">
                                            <tbody><tr>
                                                <a name="comment"></a>
                                                <td align="right" width="64">用户名：</td>
                                                <?php if(session('?username')): ?><td width="631"><?php echo (session('username')); ?></td>
                                                    <?php else: ?>
                                                    <td width="631">匿名用户</td><?php endif; ?>
                                                </tr>
                                                <tr>
                                                    <td align="right">E-mail：</td>
                                                    <td>
                                                        <input name="com_email" id="email" maxlength="100" class="inputBorder" type="text" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right">评价等级：</td>
                                                    <td>
                                                        <input name="com_rank" value="1" id="comment_rank1" type="radio" />
                                                        <img src="/Public/Home/images/stars1.gif" />
                                                        <input name="com_rank" value="2" id="comment_rank2" type="radio" />
                                                        <img src="/Public/Home/images/stars2.gif" />
                                                        <input name="com_rank" value="3" id="comment_rank3" type="radio" />
                                                        <img src="/Public/Home/images/stars3.gif" />
                                                        <input name="com_rank" value="4" id="comment_rank4" type="radio" />
                                                        <img src="/Public/Home/images/stars4.gif" />
                                                        <input name="com_rank" value="5" checked="checked" id="comment_rank5" type="radio" />
                                                        <img src="/Public/Home/images/stars5.gif" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top">评论内容：</td>
                                                    <td>

                                                        <textarea name="com_content" class="inputBorder" style="height: 50px; width: 620px;"></textarea>
                                                        <input name="pid" value="0" type="hidden" id="comment_id"/>
                                                        <input name="com_goodsid" value="<?php echo ($data["id"]); ?>" type="hidden" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div style="padding-left: 15px; text-align: left; float: left;">
                                                            验证码：<input name="captcha" class="inputBorder" style="width: 50px; margin-left: 5px;" type="text" />
                                                            <img src='/Home/Goods/verify' alt="captcha" onclick="this.src='/Home/Goods/verify/t/'+Math.random();" class="captcha" />
                                                        </div>
                                                        <input name="" value="发表评论" class="f_r bnt_blue_1" style="margin-right: 8px;" type="submit" />
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="blank5"></div>

                   </div>
            </div>

        </div>
        <div class="blank"></div>

            <script type="text/javascript" >

                $(function () {
                    //给收藏增加点击事件
                    $('#cart_add').click(function () {

                       //改变form action 属性 并提交
                        $('#form_cart').attr('action','<?php echo U("Cart/cart_add");?>');

                      $('#form_cart').submit();

                    });

                    //点击购买处理未登录
                    $('#buy').click(function () {
                        //判断用户是否登录没有登录登登录后处理 登录后直接进入购买页面
                        if ( '<?php echo (session('username')); ?>' == ''){

                            layer.open({
                                type: 1,
                                title: '登录页',
                                fix: false,
                                maxmin: true,
                                shadeClose: true,
                                area: ['600', '300px'],
                                content: '<form action="" method="post" id="login_form"><table align="left" border="0" cellpadding="3" cellspacing="5" width="100%"><tbody><tr><td align="right" width="15%">用户名</td><td width="85%">' +
                                '<input name="username" size="25" id="username" class="inputBg" type="text"></td></tr><tr><td align="right">密码</td><td><input name="password" size="15" class="inputBg"  id="password" type="password"></td></tr><tr><td colspan="2"></td></tr><tr><td>&nbsp;</td><td align="left"><input  value="" onclick="login_submit()" class="us_Submit" type="button" /></td></tr><tr><td></td><td><a href="#" class="f3">注册邮件找回密码</a></td></tr></tbody></table></form>',
                                end: function(){
                                    layer.tips('Hi', '#about', {tips: 1})
                                }

                            });

                        }else {
                            //已经登录直接调转购买页面
                            $('#form_cart').attr('action','<?php echo U("order/buy");?>');

                            $('#form_cart').submit();
                        }

                    });
                    //清除浏览历史处理
                    $('#clear_history').click(function () {
                        $.post('<?php echo U("Goods/history_del");?>');
                        $(this).parents('#history_list').remove();

                    })

                });
                //登录处理
                function login_submit(){

                    //获取用户输入的数据
                    var username = $('#username').val();
                    var password = $('#password').val();
                 //发送ajAX请求
                    $.post('<?php echo U("Login/login");?>',{'username':username,'password':password},function (data) {
                        console.log(data);
                        if (data.status == 1){
                            //登录成功携带数据提交至点单页
                            //改变form action 属性 并提交
                            $('#form_cart').attr('action','<?php echo U("order/buy");?>');

                            $('#form_cart').submit();
                        }else {
                            //登录失败提示信息
                            layer.msg(data.info);
                        }
                    },'json');
                    
                }

                function getpid(pid) {
                    $('#comment_id').val(pid);
                }

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