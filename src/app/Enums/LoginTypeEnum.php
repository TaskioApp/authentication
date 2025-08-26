<?php

namespace Taskio\Authentication\Enums;

enum LoginTypeEnum: string
{
    case UsingPassword = 'usging_password';
    case UsingOtp = 'using_otp';
}
