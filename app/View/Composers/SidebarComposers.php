<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Models\Admin\Category;

class SidebarComposers
{
    
    public function compose(View $view)
    {
        $view->with('slidebar', Category::where('partent_Id',0)->take(2)->get());
    }
}