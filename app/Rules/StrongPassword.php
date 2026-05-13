<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class StrongPassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value)) {
            $fail('The :attribute must be a valid string.');

            return;
        }

        if (strlen($value) < 8) {
            $fail('The :attribute must be at least 8 characters.');
        }

        if (! preg_match('/[A-Z]/', $value)) {
            $fail('The :attribute must contain at least one uppercase letter.');
        }

        if (! preg_match('/[a-z]/', $value)) {
            $fail('The :attribute must contain at least one lowercase letter.');
        }

        if (! preg_match('/\d/', $value)) {
            $fail('The :attribute must contain at least one number.');
        }

        if (! preg_match('/[^a-zA-Z\d]/', $value)) {
            $fail('The :attribute must contain at least one special character.');
        }
    }
}
