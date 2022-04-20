<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-product', function (User $user, Product $product) {
            return $user->id == $product->userId
                ? Response::allow()
                : Response::deny('Insufficent permissions.');
        });

        Gate::define('view-dashboard_settings', function (User $user, string $id) {
            return $user->id == $id
                ? Response::allow()
                : Response::deny('Insufficent permissions.');
        });
    }
}
