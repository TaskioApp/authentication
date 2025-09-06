<?php

namespace Taskio\Authentication\Authenticator;

use Taskio\Authentication\Interfaces\AuthenticatorInterface;

class AppAuthenticator implements AuthenticatorInterface
{
    public function verify(object $user): array
    {
        $token = $user->createToken('my-plain-token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function isBanned(object $user): bool
    {
        return (bool) $user->banned_at;
    }

    public function isActivated(object $user): bool
    {
        return (bool) $user->activated_at;
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
