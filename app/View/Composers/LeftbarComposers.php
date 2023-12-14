<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Models\Admin\Category;

class LeftbarComposers
{
    
    public function compose(View $view)
    {
        $view->with('leftbar', Category::where('partent_Id',0)->get());
    }
}
