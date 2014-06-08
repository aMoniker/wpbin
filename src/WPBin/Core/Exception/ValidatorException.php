<?php

namespace WPBin\Core\Exception;

class ValidatorException extends \InvalidArgumentException
{
    private $errors;

    public function __construct($message, Array $errors, Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
        $this->setErrors($errors);
    }

    public function setErrors(Array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors ?: array();
    }
}