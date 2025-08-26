<?php

namespace Taskio\Authentication\Interfaces;

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
