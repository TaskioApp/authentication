<?php

namespace Taskio\Authentication\RegisterValidator;

use Taskio\Authentication\Interfaces\RegisterValidatorInterface;

class RegisterByOtpValidator implements RegisterValidatorInterface
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:100'],
            'otp' => ['required', 'integer']
        ];
    }
}
