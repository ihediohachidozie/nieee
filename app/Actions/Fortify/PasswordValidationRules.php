<?php

namespace App\Actions\Fortify;

//use Laravel\Fortify\Rules\Password;
use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        //return ['required', 'string', new Password, 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'];
        return ['required', 'string', 
        Password::min(8)->letters()
        ->mixedCase()
        ->numbers()
        ->symbols()
        ->uncompromised(), 'confirmed'];
    }
}
