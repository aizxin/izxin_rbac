<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 管理员共享
        view()->composer(
            'layouts.admin', 'App\Http\ViewComposers\AdminComposer'
        );
        // 菜单共享
        view()->composer(
            'layouts.admin', 'App\Http\ViewComposers\MenuComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
