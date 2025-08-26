<?php

namespace Taskio\Authentication\RegisterValidator;

use Taskio\Authentication\Interfaces\RegisterValidatorInterface;

class RegisterByPasswordValidator implements RegisterValidatorInterface
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'max:100']
        ];
    }
}
