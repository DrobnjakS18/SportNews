<?php

namespace App\Providers;

use App\Services\PostService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $postService = new PostService();
        $nav = $postService::getAll();
        View::share('nav', $nav);
    }
}
