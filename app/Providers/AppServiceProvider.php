<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\SidebarComposers;
use App\View\Composers\LeftbarComposers;
use App\View\Composers\AdSideBarComposers;
use App\Models\Admin\NotificationFake;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer(['user_m.partial.sidebar'],  SidebarComposers::class );
        view::composer(['user_m.partial.left_sidebar'],  LeftbarComposers::class );
        view::composer(['admin.partial.sideBar'],  AdSideBarComposers::class );

        View::composer('admin.partial.head', function ($view) {
            $view->with('head',NotificationFake::where('read_at' , null)->latest()->get())
            ->with('author', Auth::user());
        });
    }
}
