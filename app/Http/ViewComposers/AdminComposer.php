<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class AdminComposer
{
    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', auth()->user()->toArray());
    }
}