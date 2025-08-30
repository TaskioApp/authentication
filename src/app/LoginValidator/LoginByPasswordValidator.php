<?php

namespace Taskio\Authentication\LoginValidator;

use Taskio\Authentication\Interfaces\LoginValidatorInterface;

class LoginByPasswordValidator implements LoginValidatorInterface
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'max:100']
        ];
    }
}
