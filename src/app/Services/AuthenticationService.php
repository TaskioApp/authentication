<?php

namespace Taskio\Authentication\Services;

use Illuminate\Validation\ValidationException;
use Taskio\Authentication\Events\UserLogin;
use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\Authentication\Facades\OtpGeneratorFacade;
use Taskio\Authentication\Helpers\AuthenticationHelper;
use Taskio\UserManagement\Services\UserManagementService;

class AuthenticationService
{
    public function __construct(public readonly UserManagementService $userManagementService) {}

    public function verify($params)
    {
        $username = $params['username'];
        $code = $params['code'];

        $user = $this->userManagementService->getByUsername($username);
        $validOtp = $this->userManagementService->checkValidOtp($user, $code);

        if (!$validOtp) {
            throw ValidationException::withMessages(['code' => __('authentication::messages.wrong_otp')]);
        }

        return AuthenticationFacade::verify($user);
    }

    public function login(array $params)
    {
        $username = $params['username'];

        $user = $this->userManagementService->getByUsername($username);
        $usernameType = AuthenticationHelper::detectUsername($username);

        if (!$user) {
            $user = $this->userManagementService->store([$usernameType => $username]);
        } else {

            if (AuthenticationFacade::isBanned($user)) {
                throw ValidationException::withMessages(['username' => __('authentication::messages.operation.banned')]);
            }
        }
        $code =  $this->userManagementService->getValidOtp($user);

        if (!$code) {
            $code = OtpGeneratorFacade::generate();
        }

        $this->userManagementService->storeOtp($user, $code);

        UserLogin::dispatch($username, $code);

        return ['user' => $user, 'code' => $code];
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
