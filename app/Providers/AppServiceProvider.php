<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Province;
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
        $data['categories'] = Categories::all();
        view()->share($data);
    }
}
