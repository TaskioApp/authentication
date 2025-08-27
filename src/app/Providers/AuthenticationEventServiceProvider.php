<?php

namespace Taskio\Authentication\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Taskio\Authentication\Events\UserRegistered;
use Taskio\Authentication\Listeners\SendOtp;

class AuthenticationEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        UserRegistered::class => [
            SendOtp::class
        ]
    ];
}
