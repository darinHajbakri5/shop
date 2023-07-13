<?php

namespace App\Providers;
use App\Models\User;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Silber\Bouncer\BouncerFacade as Bouncer;


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


    }

}
