<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Gate::define('isAdmin', function ($user) {
            $roleUser = User::where('id',$user->id)->get()->firstOrFail();
            return $roleUser->role == "manager";
        });
        Gate::define('isStudent', function ($user) {
            $roleUser = User::where('id',$user->id)->get()->firstOrFail();
            return $roleUser->role == "student";
        });
        Gate::define('isTeacher', function ($user) {
            $roleUser = User::where('id',$user->id)->get()->firstOrFail();
            return $roleUser->role == "teacher";
        });
    }
}
