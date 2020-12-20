<?php

namespace App\Providers;

use App\Services\PostService;
use Illuminate\Support\Facades\Schema;
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

        if (Schema::hasTable('posts')) {
            $postService = new PostService();
            $nav = $postService::getAll()->where('status','verified');

            View::share('nav', $nav);
        }
    }
}
