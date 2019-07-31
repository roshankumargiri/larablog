<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;

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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar', function ($view) {
            $categories = Category::with(['posts' => function ($query) {
                $query->published();
            }])->orderBy('title', 'asc')->get();
            return $view->with('categories', $categories);
        });


        view()->composer('partials.sidebar', function ($view) {
            $popular_posts = Post::published()->orderBy('view_count', 'desc')->limit(4)->get();
            return $view->with('popular_posts', $popular_posts);
        });
    }
}
