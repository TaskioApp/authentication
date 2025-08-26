<?php

namespace Taskio\Authentication\OtpGenerator;

use Taskio\Authentication\Interfaces\OtpGeneratorInterface;

class SimpleOtpGenerator implements OtpGeneratorInterface
{
    public function generate()
    {
        return random_int(10000, 99999);
    }
}
