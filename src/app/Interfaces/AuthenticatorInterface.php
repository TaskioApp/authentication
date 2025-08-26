<?php

namespace Taskio\Authentication\Interfaces;

interface AuthenticatorInterface
{
    public function login(object $user);
    public function logout(object $user);
    public function isBanned(object $user);
    public function isActivated(object $user);
    public function me(object $user);
}
