<?php

namespace Taskio\Authentication\Authenticator;

use Illuminate\Support\Facades\Auth;
use Taskio\Authentication\Interfaces\AuthenticatorInterface;

class WebAuthenticator implements AuthenticatorInterface
{
    public function login(object $user): array
    {
        Auth::login($user);

        return [
            'user' => $user
        ];
    }

    public function isBanned(object $user): bool
    {
        return $user->is_banned;
    } 

    public function isActivated(object $user): bool
    {
        return $user->is_activated;
    } 

    public function logout(object $user) {}

    public function me(object $user): object
    {
        return $user;
    }
}
