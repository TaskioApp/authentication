<?php

namespace Taskio\Authentication\Facades;

use Illuminate\Support\Facades\Facade;

class AuthenticationFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'facade.Authentication';
    }

    public static function shouldProxyTo(string $class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
