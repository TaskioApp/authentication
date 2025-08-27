<?php

namespace Taskio\Authentication\OtpSender;

use Taskio\Authentication\Interfaces\OtpSenderInterface;

class Sms implements OtpSenderInterface
{
    public function send(string $to, string $text)
    {
        return 'Send code to mobile ' . $to;
    }
}
