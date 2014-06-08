<?php

namespace WPBin\Core\Usecase\Paste;

use WPBin\Core\Entity\Paste;

interface CreateRepository
{
    public function create(Paste $entity);
}