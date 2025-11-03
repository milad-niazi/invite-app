<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CeremonyRepository;

class CeremonyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('ceremony.manager', function ($app) {
            return new CeremonyRepository();
        });
    }

    public function boot()
    {
        //
    }
}
