<?php
namespace Admin\Controller;

class IndexController extends CommonController
{
    //后天主页面
    public function index()
    {
      $this->display();
    }
    //头部
    public function head()
    {
        $this->display();
    }
    //右边
        public function right()
    {

        $this->assign('date',time());
        $this->display();
    }
    //左边
    public function left()
    {
        $model = D('Access');
        $menuData = $model->alias('a')->join('left join tp_menu as b on a.menu_id=b.id' )->where(array('a.role_id'=>session('role_id'),'b.is_show'=>1))->select();
        $menuData = list_to_tree($menuData);
//       dump($menuData);die;
        $this->assign('menuData',$menuData);
        $this->display();
    }
}