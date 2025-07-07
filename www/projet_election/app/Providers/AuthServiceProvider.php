<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Representative;
use App\Models\User;
use App\Policies\EventPolicy;
use App\Policies\RepresentativePolicy;
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
    /**
     * Register any application authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::policy(Event::class, EventPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Representative::class, RepresentativePolicy::class);
    }
}
