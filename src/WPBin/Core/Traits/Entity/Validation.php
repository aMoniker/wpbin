<?php

namespace WPBin\Core\Traits\Entity;

trait Validation
{
    protected $validator;

    protected function validateAndSet($property, $value, $validators = null)
    {
        if (!$validators
         && property_exists($this, 'validator')
         && $this->validator
        ) {
            $validators = $this->validator;
        }

        if (!is_array($validators)) { $validators = array($validators); }

        foreach ($validators as $validator) {
            if (!$validator->check([$property => $value])) {
                return false;
            }
        }

        $this->$property = $value;
        return true;
    }
}