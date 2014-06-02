<?php

namespace WPBin\Tool;

use WPBin\Entity;

interface Validator
{
    /**
     * @param Entity $entity Entity to be checked
     * @return bool
     * @throws WPBin\Exception\Validator If not valid
     */
    public function check(Entity $entity);
}