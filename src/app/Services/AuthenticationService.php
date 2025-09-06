<?php

namespace Taskio\Authentication\Services;

use Illuminate\Validation\ValidationException;
use Taskio\Authentication\Events\UserLogin;
use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\UserManagement\Services\UserManagementService;

class AuthenticationService
{
    public function __construct(public readonly UserManagementService $userManagementService) {}

    public function verify($params)
    {
        $username = $params['username'];
        $otp = $params['otp'];

        return AuthenticationFacade::verify($username, $otp);
    }

    public function login(array $params)
    {
        $username = $params['username'];

        $user = $this->userManagementService->getByUsername($username);

        if (!$user) {
            $user = $this->userManagementService->store(['username', $username]);
        } else {

            if (AuthenticationFacade::isBanned($user)) {
                throw ValidationException::withMessages(['username' => __('authentication::messages.operation.banned')]);
            }
        }

        UserLogin::dispatch($username);
    }

    public function logout($request)
    {
        return AuthenticationFacade::logout($request);
    }

    public function me(object $user)
    {
        return $user;
    }
}
