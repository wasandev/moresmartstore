<?php

namespace App\Providers;

use App\Blog;
use App\Blog_cat;
use App\Businesstype;
use App\Category;
use App\Comment;
use App\Observers\Blog_catObserver;
use App\Observers\BlogObserver;
use App\Observers\BusinesstypeObserver;
use App\Observers\CategoryObserver;
use App\Observers\CommentObserver;
use App\Page;
use App\Observers\PageObserver;
use App\Post;
use App\Observers\PostObserver;
use App\Observers\ProductObserver;
use App\Observers\UnitObserver;
use App\Observers\VendorObserver;
use App\Product;
use App\Unit;
use App\Vendor;
use Illuminate\Support\ServiceProvider;

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
        Page::observe(PageObserver::class);
        Post::observe(PostObserver::class);
        Blog::observe(BlogObserver::class);
        Blog_cat::observe(Blog_catObserver::class);
        Businesstype::observe(BusinesstypeObserver::class);
        Category::observe(CategoryObserver::class);
        Comment::observe(CommentObserver::class);
        Product::observe(ProductObserver::class);
        Unit::observe(UnitObserver::class);
        Vendor::observe(VendorObserver::class);
    }
}
