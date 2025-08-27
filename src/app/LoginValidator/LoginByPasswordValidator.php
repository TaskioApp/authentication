<?php

namespace Taskio\Authentication\LoginValidator;

use Taskio\Authentication\Interfaces\LoginValidatorInterface;
use Taskio\Authentication\Rules\UsernameRule;
use Taskio\UserManagement\Services\UserManagementService;

class LoginByPasswordValidator implements LoginValidatorInterface
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:100', new UsernameRule(app(UserManagementService::class))],
            'password' => ['required', 'max:100']
        ];
    }
}
