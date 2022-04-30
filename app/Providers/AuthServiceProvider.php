<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Post;
use App\Policies\TeamPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            return $user->role_id == 1;
         });
         Gate::define('can-delete',[UserPolicy::class,'delete']);
        //  Gate::define('isPrivate',[UserPolicy::class,'isPrivate']);
    }
}
