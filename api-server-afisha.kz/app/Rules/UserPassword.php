<?php

namespace App\Rules;

use Illuminate\Validation\Rules\Password;

class UserPassword extends Password
{
    protected $min = 6;
    protected $letters = true;
    protected $numbers = true;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct($this->min);
    }

}
