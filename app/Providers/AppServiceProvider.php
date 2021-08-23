<?php

namespace App\Providers;

use App\Services\Admin;
use App\Services\Permission;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('admin',function(){
            return new Admin;
        });

        $this->app->bind('permission',function(){
            return new Permission;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('components.admin-sidebar', function ($view) {
            $view->with('sidebarMenus', Admin::sidebarMenus());
        });
    }
}
