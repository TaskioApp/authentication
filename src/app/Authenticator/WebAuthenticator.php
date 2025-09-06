<?php

namespace Taskio\Authentication\Authenticator;

use Illuminate\Support\Facades\Auth;
use Taskio\Authentication\Interfaces\AuthenticatorInterface;

class WebAuthenticator implements AuthenticatorInterface
{
    public function verify(object $user): array
    {
        Auth::login($user);

        return [
            'user' => $user
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
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function me(object $user): object
    {
        return $user;
    }
}
