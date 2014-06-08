<?php

namespace WPBin\Core\Usecase\Tag;

use WPBin\Core\Entity\Tag;

interface CreateRepository
{
    public function create(Tag $entity);
}