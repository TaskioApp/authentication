<?php

namespace Taskio\Authentication\AuthenticationType;

use Taskio\Authentication\Interfaces\AuthenticationTypeInterface;

class AuthenticationByOtp implements AuthenticationTypeInterface
{
    public function check(object $user, array $params): bool
    {
        $otp = $params['otp'];
        return true;
    }
}
