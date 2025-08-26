<?php

namespace Taskio\Authentication\Interfaces;

interface LoginValidatorInterface
{
    public function rules(): array;
}
