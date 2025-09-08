<?php

namespace Taskio\Authentication\Facades;

use Illuminate\Support\Facades\Facade;

class BaseFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return self::$facadeName;
    }

    public static function shouldProxyTo(string $class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
