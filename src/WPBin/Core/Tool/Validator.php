<?php

namespace WPBin\Core\Tool;

use WPBin\Core\Data;

interface Validator
{
    /**
     * @param Data $entity Data to be checked
     * @return bool
     * @throws WPBin\Core\Exception\Validator If not valid
     */
    public function check(Data $entity);
}