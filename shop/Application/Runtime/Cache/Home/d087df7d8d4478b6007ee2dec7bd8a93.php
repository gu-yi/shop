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
		
		
		
<script type="text/javascript" src="/Public/Home/js/jquery-1.7.2.js"></script>

<style type="text/css">
    table {border:1px solid #dddddd; border-collapse: collapse; width:99%; margin:auto;}
    td {border:1px solid #dddddd;}
    #consignee_addr {width:450px;}
</style>



<div class="block box">
            <div class="blank"></div>
            <div id="ur_here">
                当前位置: <a href="#">首页</a> <code>&gt;</code> 购物车
            </div>
        </div>
        <div class="blank"></div>

        <div class="blank"></div>
        <div class="block">
            <div class="flowBox">
                <h6><span>商品列表</span></h6>
                <form id="formCart">
                    <table cellpadding="5" cellspacing="1" id="del_all">
                        <tbody><tr>
                                <th>商品名称</th>
                                <th>属性</th>
                                <th>市场价</th>
                                <th>本店价</th>
                                <th>购买数量</th>
                                <th>小计</th>
                                <th>操作</th>
                            </tr>


                        <?php if(is_array($cart_data)): $i = 0; $__LIST__ = $cart_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart_data): $mod = ($i % 2 );++$i;?><tr>
                                <td align="center">
                                    <a href="#" target="_blank"><img style="width: 80px; height: 80px;" src="/Uploads/<?php echo ($cart_data["goods_smallpic"]); ?>" title="P806" /></a><br />
                                    <a href="#" target="_blank" class="f6"><?php echo ($cart_data["goods_name"]); ?></a>
                                </td>
                                <td>
                                    <?php if(is_array($cart_data[goods_attr])): $i = 0; $__LIST__ = $cart_data[goods_attr];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i; echo ($key); ?>:<?php echo ($voo); ?> <br /><?php endforeach; endif; else: echo "" ;endif; ?>
                                </td>
                                <td align="right">￥<span class="goods_mprice"><?php echo ($cart_data["goods_mprice"]); ?></span>元</td>
                                <td align="right">￥<span class="goods_price"><?php echo ($cart_data["goods_price"]); ?></span>元</td>
                                <td align="right">
                                    <a href="#" class="mus" data_id="<?php echo ($cart_data[goods_id]); ?>"><span style="font-size: 16px">[-]</span></a>

                                    <input name="goods_number[43]" id="goods_number_43" class="goods_number_43" value="<?php echo ($cart_data["number"]); ?>" size="4" class="inputBg" style="text-align: center;" onkeydown="showdiv(this)" type="text" />
                                    <a href="#" class="add" data_id="<?php echo ($cart_data[goods_id]); ?>"><span style="font-size: 16px">[+]</span></a>
                                    <input class="mmtotal" type="hidden" value="<?php echo ($cart_data["goods_mtotal"]); ?>">
                                </td>
                                <td align="right">￥<span class="total"><?php echo ($cart_data["goods_total"]); ?></span>元</td>
                                <td align="center">
                                    <a href="javascript:void(0)" data_id="<?php echo ($cart_data[goods_id]); ?>" class="f6 cart_del">删除</a>
                                </td>

                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                        </tbody></table>
                    <table cellpadding="5" cellspacing="1">
                        <tbody><tr>
                                <td>
                                    购物金额总计 ￥<span class="totals"><?php echo ($totals); ?></span>元，比市场价 ￥<span id="mtotals"><?php echo ($mtotals); ?></span>元 节省了 ￥<span id="chae"><?php echo ($mtotals-$totals); ?></span>元               </td>
                                <td align="right">
                                    <input value="清空购物车" class="bnt_blue_1" id="checkout" type="button" />
                                    <input name="submit" class="bnt_blue_1" value="更新购物车" type="submit" />
                                </td>
                            </tr>
                        </tbody></table>
                    <input name="step" value="update_cart" type="hidden" />
                </form>
                <table cellpadding="5" cellspacing="0" width="99%">
                    <tbody><tr>
                            <td><a href="<?php echo U('Goods/goods_list');?>"><img src="/Public/Home/images/continue.gif" alt="continue" /></a></td>
                            <td align="right"><a href="<?php echo U('Order/buy');?>" ><img src="/Public/Home/images/checkout.gif" alt="checkout" /></a></td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="blank"></div>
            <div class="blank5"></div>
        </div>

        <div class="blank"></div>
        
    <script type="text/javascript">
        //删除操作
        $(function () {
            $('.cart_del').click(function () {
             var _this = $(this);
             var id = _this.attr('data_id');
            $.post('/Home/Cart/cart_del',{'goods_id':id},function (data) {
                if (data.status ==1){
                    _this.parents('tr').remove();
                }
            },'json');
            });
            //加号事件
            $('.add').click(function () {


               //后去input矿的值
                var val = $(this).prev('input').val();
                val++;
                $(this).prev('input').val(val);
                //小计
                total($(this),val);


                var id = $(this).attr('data_id');

                //总计
                var totals = totalss();
                $('.totals').text(totals);
                //购物车商品数量总数
                var nums = numss();
                $('.good_num').text(nums);
                //发送后台修改cookie值
                $.post('/Home/Cart/cart_update',{'goods_id':id,'number':val,'totals':totals,'num':nums});
                //市场价格总计
                mtotals($(this),val);
                    // 差额
                var chae=$('#mtotals').text()- $('#totals').text();
                $('#chae').text(chae);
            });

            //减号号事件
            $('.mus').click(function () {

                //后去input矿的值
                var val = $(this).next('input').val();
                if (val >1){
                    val--;
                }

                $(this).next('input').val(val);
                var id = $(this).attr('data_id');

                //小计
                total($(this),val);
                //总计
                var totals = totalss();
                $('.totals').text(totals);
                //购物车商品数量总数
                var nums = numss();
                $('.good_num').text(nums);
                //发送后台修改cookie值
                $.post('/Home/Cart/cart_update',{'goods_id':id,'number':val,'totals':totals,'num':nums});
                //市场价格总计
                mtotals($(this),val);
                //差额
                var chae=$('#mtotals').text()- $('#totals').text();
                $('#chae').text(chae);

            });
                //小计
            function total(obj,val) {

                var price =obj.parents('tr').find('.goods_price').text();
                var total = price*val;
                obj.parents('tr').find('.total').text(total);
            }
            //总计
            function totalss() {

                var totals=0;
                $('.total').each(function () {
                    var total1 = $(this).text();
                    totals += parseInt(total1);
                });

              return totals;
            }
            //商品数量总计
            function numss() {

                var nums=0;
                $('.goods_number_43').each(function () {
                    var total1 = $(this).val();
                    nums += parseInt(total1);
                });

                return nums;
            }

            //市场总价

            function mtotals(obj,val) {
                var mprice =obj.parents('tr').find('.goods_mprice').text();
                var mtotal = mprice*val;
                console.log(mtotal);
               console.log( obj.parents('td').find('.mmtotal').val(mtotal));
                var mtotals=0;
                $('.mmtotal').each(function () {
                    var total1 = $(this).val();
                    mtotals += parseInt(total1);
                });

                $('#mtotals').text(mtotals);
            }
            //当清空购物车
        $('#checkout').click(function () {
            $.post('/Home/Cart/cart_all_delete');
            $('#del_all').remove();
        })
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