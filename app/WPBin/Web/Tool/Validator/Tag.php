<?php

namespace WPBin\Web\Tool\Validator;

use WPBin\Web\Tool\Validator as BaseValidator;
use WPBin\Core\Tool\Validator\Tag as TagValidator;

class Tag extends BaseValidator implements TagValidator
{
    protected $rules = [
        'id'      => ['integer'],
        'name'    => ['min:1', 'max:255'],
        'url'     => ['url'],
        'created' => ['date'],
        'updated' => ['date'],
    ];

    protected $invalid_message = 'Invalid Tag';
}