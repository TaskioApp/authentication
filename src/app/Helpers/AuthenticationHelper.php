<?php

namespace Taskio\Authentication\Helper;

class AuthenticationHelper
{

    public static function detectUsername(string $username)
    {
        return filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }
}
