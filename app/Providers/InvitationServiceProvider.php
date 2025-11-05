<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\InvitationRepository;
use PHPUnit\TextUI\XmlConfiguration\LogToReportMigration;
use PHPUnit\TextUI\XmlConfiguration\LoadedFromFileConfiguration;

class InvitationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('invitation.manager', function ($app) {
            return new InvitationRepository();
        });
    }

    public function boot()
    {
        //
    }
}
