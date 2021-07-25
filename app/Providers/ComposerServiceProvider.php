<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 
        View::composer('layouts.admin', function($view) {
            $news =  Notification::where('user_id',auth()->user()->id)->where('status',0)->get();
            $notications = Notification::where('user_id',auth()->user()->id)->get();
            $view->with(['notifications' => $notications,'news'=>$news]);
        });
        View::composer('layouts.account', function($view) {
            $news =  Notification::where('user_id',auth()->user()->id)->where('status',0)->get();
            $notications = Notification::where('user_id',auth()->user()->id)->get();
            $view->with(['notifications' => $notications,'news'=>$news]);
        });
        View::composer('layouts.staff', function($view) {
            $news =  Notification::where('user_id',auth()->user()->id)->where('status',0)->get();
            $notications = Notification::where('user_id',auth()->user()->id)->get();
            $view->with(['notifications' => $notications,'news'=>$news]);
        });
        View::composer('layouts.department', function($view) {
            $news =  Notification::where('user_id',auth()->user()->id)->where('status',0)->get();
            $notications = Notification::where('user_id',auth()->user()->id)->get();
            $view->with(['notifications' => $notications,'news'=>$news]);
        });
        View::composer('layouts.client', function($view) {
            $news =  Notification::where('user_id',auth()->user()->id)->where('status',0)->get();
            $notications = Notification::where('user_id',auth()->user()->id)->get();
            $view->with(['notifications' => $notications,'news'=>$news]);
        });
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
