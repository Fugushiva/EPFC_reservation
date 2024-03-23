<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-artist', function (User $user){
            return $user->role === 'admin';
        });
        Gate::define('update-artist', function (User $user){
           return $user->role === 'admin';
        });
        Gate::define('delete-artist', function (User $user){
           return $user->role === 'admin';
        });
    }
}
