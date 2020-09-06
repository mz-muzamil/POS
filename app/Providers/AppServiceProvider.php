<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //Set Default String Length
        Schema::defaultStringLength(128);

        $assets = array();

        $assets[base_path() . '/vendor/components/font-awesome/'] = public_path('assets/font-awesome');
        $assets[base_path() . '/vendor/select2/select2/dist/'] = public_path('assets/select2/dist');
        $assets[base_path() . '/resources/assets/thirdparty/'] = public_path('assets/thirdparty');
        $assets[base_path() . '/resources/assets/thirdparty/alertifyjs/'] = public_path('assets/thirdparty/alertifyjs');
        $assets[base_path() . '/resources/assets/thirdparty/gijgo_datepicker/'] = public_path('assets/thirdparty/gijgo_datepicker');
        $assets[base_path() . '/resources/assets/img/'] = public_path('assets/img');

        $assets[base_path() . '/resources/assets/js/'] = public_path('assets/js');
        $assets[base_path() . '/resources/assets/css/'] = public_path('assets/css');
        $assets[base_path() . '/resources/assets/sass/'] = public_path('assets/sass');
        $assets[base_path() . '/resources/assets/fonts/'] = public_path('assets/fonts');
        $assets[base_path() . '/resources/assets/images/'] = public_path('assets/images');

        $this->publishes($assets);
    }
}
