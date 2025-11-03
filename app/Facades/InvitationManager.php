<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class InvitationManager extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'invitation.manager';
    }
}
