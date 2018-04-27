<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;
use App\Models\Categories\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::query();
        $categories->with([
            'description' => function($query){
                $query->where('language_id', 1);
            }
        ]);
        

        View::share([
            'nowDate' => Carbon::now(),
            'categories' => $categories->get()
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
