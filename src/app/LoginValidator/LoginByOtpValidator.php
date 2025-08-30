<?php

namespace Taskio\Authentication\LoginValidator;

use Taskio\Authentication\Interfaces\LoginValidatorInterface;

class LoginByOtpValidator implements LoginValidatorInterface
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:100'],
            'otp' => ['required', 'integer']
        ];
    }
}
