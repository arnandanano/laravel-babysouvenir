<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;

use App\Models\SiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
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

        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');

        $webSetting = SiteSetting::first();
        View::share('appSetting', $webSetting);

        Paginator::useBootstrap();
    }
}
