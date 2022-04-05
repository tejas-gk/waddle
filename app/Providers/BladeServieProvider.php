<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class BladeServieProvider extends ServiceProvider
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
        //
        Blade::if('user', function ($value) {
            return '<?php if(Auth::user()->id == '.$value.'): ?>';
        });
        Blade::if('enduser', function ($value) {
            return '<?php endif; ?>';
        });
        
    }
}
