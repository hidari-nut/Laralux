<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('showUsers-permission', 'App\Policies\UserPolicy@getUsers');
        Gate::define('showMembers-permission', 'App\Policies\UserPolicy@getMembers');
        Gate::define('delete-permission', 'App\Policies\UserPolicy@delete');

        Gate::define('isOwner-role', 'App\Policies\UserPolicy@isOwner');
        Gate::define('isStaff-role', 'App\Policies\UserPolicy@isStaff');
        Gate::define('isCustomer-role', 'App\Policies\UserPolicy@isCustomer');
        Gate::define('isMember-role', 'App\Policies\UserPolicy@isMember');
    }
}
