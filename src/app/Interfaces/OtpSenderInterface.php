<?php

namespace Taskio\Authentication\Interfaces;

interface OtpSenderInterface
{
    public function send(object $user, string $text);
}
