<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Representation;
use App\Models\Show;
use App\Policies\RepresentationPolicy;
use App\Policies\ShowPolicy;
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
        Show::class => ShowPolicy::class,
        Representation::class => RepresentationPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-artist', function (User $user){
            return $user->roles->contains('role', 'admin');
        });
        Gate::define('update-artist', function (User $user){
           return $user->roles->contains('role','admin');
        });
        Gate::define('delete-artist', function (User $user){
           return $user->roles->contains('role','admin');
        });
    }
}
