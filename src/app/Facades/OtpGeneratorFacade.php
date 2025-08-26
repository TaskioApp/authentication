<?php

namespace Taskio\Authentication\Facades;

use Illuminate\Support\Facades\Facade;

class OtpGeneratorFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'facade.otpGenerator';
    }

    public static function shouldProxyTo(string $class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
