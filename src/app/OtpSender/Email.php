<?php

namespace Taskio\Authentication\OtpSender;

use Taskio\Authentication\Interfaces\OtpSenderInterface;

class Email implements OtpSenderInterface
{
    public function send(object $user, string $text)
    {
        return 'Send code to email';
    }
}
