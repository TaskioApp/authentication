<?php

namespace Taskio\Authentication\Interfaces;

interface AuthenticationTypeInterface
{
    public function check(object $user, array $params): bool;
}
