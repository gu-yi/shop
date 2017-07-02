<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
        <link href="/Public/Admin/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/umeditor/third-party/template.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Admin/umeditor/umeditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Admin/umeditor/umeditor.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/umeditor/lang/zh-cn/zh-cn.js"></script>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》添加商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Goods/showlist');?>">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goods_name" /></td>
                </tr>

                <tr>
                    <td>商品品牌</td>
                    <td>
                        <select name="brand_id">
                            <option value="0">请选择</option>
                            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["brand_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品分类</td>
                    <td>
                        <select class="cate" name="cate_id">
                            <option value="0">请选择</option>
                            <?php if(is_array($cate_data)): $i = 0; $__LIST__ = $cate_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>商品市场价格</td>
                    <td><input type="text" name="goods_mprice" /></td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input type="text" name="goods_price" /></td>
                </tr>
                <tr>
                    <td>商品重量</td>
                    <td><input type="text" name="goods_weight" /></td>
                </tr>
                <tr>
                    <td>商品排序</td>
                    <td><input type="text" name="goods_sort" /></td>
                </tr>
                <tr>
                    <td>商品数量</td>
                    <td><input type="text" name="goods_number" /></td>
                </tr>
                <tr>
                    <td>商品图片</td>
                    <td><input type="file" name="goods_image" /></td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <script type="text/plain" id="myEditor"  name="goods_introduce" style="width:800px;height:200px;"><p>请输入商品描述</p></script></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
<script type="text/javascript">
  UM.getEditor('myEditor');
  $(function () {

      $('.cate').change(function () {
          //改变类型之前删除前面类的的属性框
          $('.newTag').remove();
          var _this = $(this);
        var id = _this.val();
        var str ='';//拼接input 下拉框的字符串
        //获取商品的属性
          $.post('<?php echo U("Attribute/get_attr");?>',{'cate_id':id},function (data) {
              console.log(data);
                $.each(data,function (key,item) {
                    var option = '';//下拉框option组合用字符
                    if(item.attr_sel==0){
                      str +='<tr class="newTag"><td>'+item.attr_name+'</td><td><input type="text" value="" name="goods_attr['+item.id+'][]" /></td></tr>';
                    }else {
                        //遍历下拉框的值
                        var tmp = item.attr_val.split(',');
                        for (var i = 0;i < tmp.length;i++){
                            option += '<option value="'+tmp[i]+'">'+tmp[i]+'</option>'
                        }
                       str +='<tr class="newTag"><td>'+item.attr_name+'</td><td><select class="cate" name="goods_attr['+item.id+'][]">'+ option+'</select><input class="add_attr" type="button" value="+"></td></tr>';
                    }

                })
              _this.parents('tr').after(str);
          },'json');
      })
     $('.add_attr').live('click',function () {

          var trDom = $(this).parents('tr');
         cloneDom = trDom.clone();
         cloneDom.find('input').remove();
          //自定义追加内容
         var str = '<input class="mus_attr" type="button" value="-">';
          //追加到后面
           cloneDom.find('select').after(str);
            //cloneDom.find('tr').after(str);
         trDom.after(cloneDom);

      })
      $('.mus_attr').live('click',function () {
          $(this).parents('tr').remove();
      })
  })
</script>
</html>