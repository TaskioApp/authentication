<?php

namespace Taskio\Authentication\Authenticator;

use Taskio\Authentication\Interfaces\AuthenticatorInterface;

class AppAuthenticator implements AuthenticatorInterface
{
    public function login(object $user): array
    {
        $token = $user->createToken('my-plain-token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
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

    public function logout(object $request)
    {
        return $request()->user()->currentAccessToken()->delete();
    }

    public function me(object $user): object
    {
        return $user;
    }
}
