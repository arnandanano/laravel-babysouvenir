<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('isSuperuser', function(User $user){
            return $user->role_id == '1'; //Superuser
        });

        Gate::define('isDesain', function(User $user){
            return $user->role_id == '2'; //Desain
        });

        Gate::define('isOwner', function(User $user){
            return $user->role_id == '4'; //Owner
        });

        Gate::define('isAdminproduksi', function(User $user){
            return $user->role_id == '3'; //Admin Produksi
        });
    }
}
