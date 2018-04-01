<?php

namespace HEGO\Auth\Providers;

use HEGO\Support\Units\ServiceProvider;

class UnitsServiceProvider extends ServiceProvider
{
    /**
     * @var string Unit Alias for Translations and Views
     */
    protected $alias = 'auth';

    /**
     * @var bool Enable translations loading on the Unity
     */
    protected $hasTranslations = true;

    /**
     * @var array List of domain providers to register
     */
    protected $providers = [
        RouteServiceProvider::class,
    ];
}