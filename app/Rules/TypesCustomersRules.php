<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class TypesCustomersRules implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        if (!TypesCustomersSupported::tryFrom($value)) {
            $fail(
                'The selected type is invalid. Select one of the following: ' .
                implode(', ', TypesCustomersSupported::each())
            );
        }
    }
}
