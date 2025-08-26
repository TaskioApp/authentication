<?php

namespace Taskio\Authentication\Authenticator;

use Taskio\Authentication\Interfaces\AuthenticationTypeInterface;

class AuthenticationByPassword implements AuthenticationTypeInterface
{
    public function check(object $user, array $params): bool
    {
        $otp = $params['otp'];
        return true;
    }
}
