<?php

namespace Taskio\Authentication\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Taskio\Authentication\Events\UserLogin;
use Taskio\Authentication\Listeners\SendUserLoginOtp;

class AuthenticationEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        UserLogin::class => [
            SendUserLoginOtp::class
        ]
    ];
}
