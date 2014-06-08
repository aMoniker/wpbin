<?php

namespace WPBin\Web\Tool;

use WPBin\Core\Tool\Validator as ValidatorInterface;
use WPBin\Core\Exception\ValidatorException;

class Validator implements ValidatorInterface
{
    protected $rules = [];
    protected $invalid_message = 'Invalid Data';

    public function check($data)
    {
        if (!is_array($data)) { return false; }

        $validator = \Validator::make($data, $this->rules);

        if ($validator->fails()) {
            throw new ValidatorException(
                $this->invalid_message,
                (array) $validator->messages()
            );
        }

        return true;
    }
}