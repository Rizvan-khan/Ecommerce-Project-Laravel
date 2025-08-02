<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Every time 'admin.layouts.master' is loaded, categories will be shared
        View::composer('admin.layouts.master', function ($view) {
            $view->with('categories', Category::all());
        });
    }

    public function register()
    {
        //
    }
}
