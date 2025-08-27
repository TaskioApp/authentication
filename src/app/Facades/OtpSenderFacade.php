<?php

namespace Taskio\Authentication\Facades;

use Illuminate\Support\Facades\Facade;

class OtpSenderFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'facade.otpSender';
    }

    public static function shouldProxyTo(string $class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
