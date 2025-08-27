<?php

namespace Taskio\Authentication\Events;

use Illuminate\Foundation\Events\Dispatchable;

class UserRegistered
{
    use Dispatchable;

    /**
     * Create a new event instance.
     */
    public function __construct(public readonly string $to) {}
}
