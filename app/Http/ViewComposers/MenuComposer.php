<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Aizxin\Repositories\Eloquent\Admin\PermissionRepository;

class MenuComposer
{
    /**
     * 用户仓库实现.
     *
     * @var UserRepository
     */
    protected $menu;

    /**
     * 创建一个新的属性composer.
     *
     * @param UserRepository $menu
     * @return void
     */
    public function __construct(PermissionRepository $menu)
    {
        $this->menu = $menu;
    }

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('slidebar', $this->menu->getMenu());
    }
}