<?php

namespace Taskio\Authentication\Listeners;

use Taskio\Authentication\Events\UserLogin;
use Taskio\Authentication\Facades\OtpSenderFacade;
use Taskio\Authentication\Helpers\AuthenticationHelper;
use Taskio\Authentication\OtpSender\Email;

class SendUserLoginOtp
{
    public function handle(UserLogin $event): void
    {
        $to = $event->to;
        $type = AuthenticationHelper::detectUsername($to);

        if ($type == 'email') {
            OtpSenderFacade::shouldProxyTo(Email::class);
        }
        echo OtpSenderFacade::send($to, 'Hello');
    }
}
