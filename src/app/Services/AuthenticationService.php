<?php

namespace Taskio\Authentication\Services;

use Illuminate\Support\Facades\Hash;
use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\UserManagement\Services\UserManagementService;

class AuthenticationService
{
    public function __construct(public readonly UserManagementService $userManagementService) {}

    public function login(array $params)
    {
        $username = $params['username'];
        $password = $params['password'];

        $user = $this->userManagementService->getByUsername($username);

        if ($username) {
            if (Hash::check($password, $user->password)) {
                if (AuthenticationFacade::isBanned()) {
                    // exception
                }
                if (AuthenticationFacade::isActivated()) {
                    // exception
                }

                AuthenticationFacade::login($user);
            } else {
                // exception
            }
        } else {
            //    exception
        }

        return AuthenticationFacade::login($params);
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
