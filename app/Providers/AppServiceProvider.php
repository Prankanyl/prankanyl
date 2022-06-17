<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Database\QueryException;
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
        try{
            $setting = Setting::where('active', 1)->first();
            view()->share('setting', $setting);
        }
        catch (QueryException $e){

        }
    }
}
