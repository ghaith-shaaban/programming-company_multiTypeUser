<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin',function(User $user):bool{
            return $user->role == 0;
        });
        Gate::define('buyer',function(User $user):bool{
            return $user->role == 1;
        });
        Gate::define('programmer',function(User $user):bool{
            return $user->role == 2;
        });
        Gate::define('programmerInfo',function(User $user):bool{
            return isset($user->programmer['city'])&&isset($user->programmer['job']);
        });
         Gate::define('buyerInfo',function(User $user):bool{
            return isset($user->buyer['bank_account']);
        });
    }
}
