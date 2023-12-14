<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdSideBarComposers
{
    
    public function compose(View $view)
    {
         $view->with('users',Auth::user());       
    }

  
}