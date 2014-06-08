<?php

namespace WPBin\Core\Tool;

use WPBin\Core\Data;

interface Validator
{
    /**
     * @param $data to be checked
     * @return bool
     * @throws WPBin\Core\Exception\Validator If not valid
     */
    public function check($data);
}