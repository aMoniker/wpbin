<?php

namespace WPBin\Web\Tool\Validator;

use WPBin\Web\Tool\Validator as BaseValidator;
use WPBin\Core\Tool\Validator\Paste as PasteValidator;

class Paste extends BaseValidator implements PasteValidator
{
    protected $rules = [
        'id'        => ['integer'],
        'parent_id' => ['integer', 'exists:pastes,id'],
        'user_id'   => ['integer', 'exists:users,id'],
        'hash'      => ['alpha_num', 'min:1', 'max:127', 'unique:pastes'],
        'title'     => ['max:255'],
        'created'   => ['date'],
        'updated'   => ['date'],
    ];

    protected $invalid_message = 'Invalid Paste';
}