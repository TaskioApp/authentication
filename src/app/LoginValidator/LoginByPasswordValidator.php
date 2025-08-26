<?php

namespace Taskio\Authentication\Interfaces;

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
