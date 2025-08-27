<?php

namespace Taskio\Authentication\Interfaces;

interface OtpSenderInterface
{
    public function send(string $to, string $text);
}
