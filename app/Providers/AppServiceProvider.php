<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\BladeServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Laravel\Cashier\Cashier;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Cashier::useCustomerModel(User::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Cashier::ignoreMigrations();
        Cashier::calculateTaxes();
        
    }
}
