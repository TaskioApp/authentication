<?php

namespace Taskio\Authentication\Interfaces;

interface AuthenticatorInterface
{
    public function login(object $user): array;
    public function verify(string $username, string $otp): array;
    public function logout(object $request);
    public function isBanned(object $user): bool;
    public function isActivated(object $user): bool;
    public function me(object $user): object;
}
