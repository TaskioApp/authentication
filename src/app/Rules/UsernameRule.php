<?php

namespace Taskio\Authentication\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UsernameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isEmail = filter_var($value, FILTER_VALIDATE_EMAIL);

        $isMobile = preg_match('/^(?:\+98|0)?9\d{9}$/', $value);

        if (!$isEmail && !$isMobile) {
            $fail(__('authentication::messages.invalid_username'));
            return;
        }
    }
}
