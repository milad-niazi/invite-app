<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CeremonyManager extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ceremony.manager';
    }
}
