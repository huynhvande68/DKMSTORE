<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Models\Admin\NotificationFake;
use Illuminate\Support\Facades\Auth;

class AdHeadComposers
{
    
    public function compose(View $view)
    {
         $view->with('head',NotificationFake::where('read_at' , null)->latest()->get());       
    }

  
}