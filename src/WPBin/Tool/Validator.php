<?php

namespace WPBin\Tool;

use WPBin\Data;

interface Validator
{
    /**
     * @param Data $entity Data to be checked
     * @return bool
     * @throws WPBin\Exception\Validator If not valid
     */
    public function check(Data $entity);
}