<?php

namespace Taskio\Authentication\Facades;

use Illuminate\Support\Facades\Facade;

class AuthenticationTypeFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'facade.AuthenticationType';
    }

    public static function shouldProxyTo(string $class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
