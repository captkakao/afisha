<?php

namespace App\Providers;

use App\Models\Cinema;
use App\Models\Event;
use App\Models\Hall;
use App\Policies\CinemaPolicy;
use App\Policies\EventPolicy;
use App\Policies\HallPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Cinema::class => CinemaPolicy::class,
        Hall::class => HallPolicy::class,
        Event::class => EventPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
