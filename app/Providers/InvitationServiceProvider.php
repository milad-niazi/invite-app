<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\InvitationLinkRepository;

class InvitationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('invitation.manager', function ($app) {
            return new InvitationLinkRepository();
        });
    }

    public function boot()
    {
        //
    }
}
