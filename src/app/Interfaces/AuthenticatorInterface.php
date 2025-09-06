<?php

namespace Taskio\Authentication\Interfaces;

interface AuthenticatorInterface
{
    public function verify(object $user): array;
    public function logout(object $request);
    public function isBanned(object $user): bool;
    public function isActivated(object $user): bool;
    public function me(object $user): object;
}
