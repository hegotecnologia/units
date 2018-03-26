<?php

namespace HEGO\Units\Core\Providers;

use Illuminate\Support\Facades\Schema;
use HEGO\Support\Units\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var string Unit Alias for Translations and Views
     */
    protected $alias = 'core';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }
}
