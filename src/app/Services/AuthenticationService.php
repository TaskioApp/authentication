<?php

namespace Taskio\Authentication\Services;

use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\Authentication\Facades\AuthenticationTypeFacade;
use Taskio\UserManagement\Services\UserManagementService;

class AuthenticationService
{
    public function __construct(public readonly UserManagementService $userManagementService) {}

    public function login(array $params)
    {
        $username = $params['username'];

        $user = $this->userManagementService->getByUsername($username);

        if (AuthenticationTypeFacade::check($user, $params)) {

            if (AuthenticationFacade::isBanned()) {
                // exception
            }
            if (AuthenticationFacade::isActivated()) {
                // exception
            }
        }

        return AuthenticationFacade::login($user);
    }

    public function logout(array $params)
    {
        return AuthenticationFacade::logout($params);
    }

    public function me(object $user)
    {
        return $user;
    }
}
