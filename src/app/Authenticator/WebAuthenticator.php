<?php

namespace Taskio\Authentication\Authenticator;

use Illuminate\Support\Facades\Auth;
use Taskio\Authentication\Interfaces\AuthenticatorInterface;

class WebAuthenticator implements AuthenticatorInterface
{
    public function login(object $user)
    {
        Auth::login($user);

        return response()->json([
            'message' => 'Logged in successfully',
            'user' => $user
        ]);
    }

    public function isBanned(object $user)
    {
        return $user->is_banned;
    }

    public function isActivated(object $user)
    {
        return $user->is_activated;
    }

    public function logout(object $user) {}

    public function me(object $user)
    {
        return $user;
    }
}
