<?php

namespace Taskio\Authentication\Events;

use Illuminate\Foundation\Events\Dispatchable;

class UserLogin
{
    use Dispatchable;

    /**
     * Create a new event instance.
     */
    public function __construct(public readonly string $to) {}
}
