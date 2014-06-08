<?php

namespace WPBin\Web\Tool\Validator;

use WPBin\Web\Tool\Validator as BaseValidator;
use WPBin\Core\Tool\Validator\User as UserValidator;

class User extends BaseValidator implements UserValidator
{
    protected $rules = [
        'id'         => ['integer'],
        'first_name' => ['min:1', 'max:255'],
        'last_name'  => ['min:1', 'max:255'],
        'username'   => ['alpha_dash', 'min:3', 'max:127'],
        'email'      => ['email', 'max:127'],
        'active'     => ['integer', 'in:1,0'],
        'created'    => ['date'],
        'updated'    => ['date'],
    ];

    protected $invalid_message = 'Invalid User';
}