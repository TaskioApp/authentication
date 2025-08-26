<?php

namespace Taskio\Authentication\AuthenticationType;

use Illuminate\Support\Facades\Hash;
use Taskio\Authentication\Interfaces\AuthenticationTypeInterface;

class AuthenticationByPassword implements AuthenticationTypeInterface
{
    public function check(object $user, array $params): bool
    {
        $password = $params['password'];
        if (!Hash::check($password, $user->password)) {
            return false;
        }

        return true;
    }
}
