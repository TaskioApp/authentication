<?php

namespace Taskio\Authentication\Services;

use Illuminate\Validation\ValidationException;
use Taskio\Authentication\Events\UserRegistered;
use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\Authentication\Facades\AuthenticationTypeFacade;
use Taskio\Authentication\Helpers\AuthenticationHelper;
use Taskio\UserManagement\Services\UserManagementService;

class AuthenticationService
{
    public function __construct(public readonly UserManagementService $userManagementService) {}

    public function register(array $params)
    {
        $username = $params['username'];

        $field = AuthenticationHelper::detectUsername($username);

        $user = $this->userManagementService->getByUsername($username);

        if (!$user) {
            $user = $this->userManagementService->store([$field => $username]);
        }

        return $user;
    }

    public function sendOtp($to)
    {
        UserRegistered::dispatch($to);
    }

    public function login(array $params)
    {
        $username = $params['username'];

        $user = $this->userManagementService->getByUsername($username);

        if (!$user) {
            throw ValidationException::withMessages(['username' => __('authentication::messages.operation.invalid_username_or_password')]);

            // exception
        } else {
            if (AuthenticationTypeFacade::check($user, $params)) {

                if (AuthenticationFacade::isBanned($user)) {
                    throw ValidationException::withMessages(['username' => __('authentication::messages.operation.banned')]);
                }
                if (AuthenticationFacade::isActivated($user)) {
                    throw ValidationException::withMessages(['username' => __('authentication::messages.operation.not_activated')]);
                }
            } else {
                throw ValidationException::withMessages(['username' => __('authentication::messages.operation.invalid_username_or_password')]);
            }
        }
        return AuthenticationFacade::login($user);
    }

    public function logout(object $user)
    {
        return AuthenticationFacade::logout($user);
    }

    public function me(object $user)
    {
        return $user;
    }
}
