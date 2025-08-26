<?php

namespace Taskio\Authentication\Authenticator;

use Taskio\Authentication\Interfaces\AuthenticatorInterface;

class AppAuthenticator implements AuthenticatorInterface
{
    public function login(object $user)
    {
        return response()->json([
            'message' => 'Logged in successfully',
            'user' => $user,
            'token' => $user->createToken('my-plain-token')->plainTextToken
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
