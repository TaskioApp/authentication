<?php

namespace Taskio\Authentication\Listeners;

use Taskio\Authentication\Events\UserRegistered;
use Taskio\Authentication\Facades\OtpSenderFacade;
use Taskio\Authentication\Helper\AuthenticationHelper;
use Taskio\Authentication\OtpSender\Email;

class SendOtp
{
    public function handle(UserRegistered $event): void
    {
        $to = $event->to;
        $type = AuthenticationHelper::detectUsername($to);

        if ($type == 'mobile') {
            echo OtpSenderFacade::send($to, 'Hello');
        } else {
            OtpSenderFacade::shouldProxyTo(Email::class);
            echo OtpSenderFacade::send($to, 'Hello');
        }
    }
}
