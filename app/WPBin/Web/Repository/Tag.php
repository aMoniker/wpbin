<?php

namespace WPBin\Web\Repository;

use WPBin\Web\Repository;
use WPBin\Core\Entity\TagRepository;
use WPBin\Core\Usecase\Tag\CreateRepository;

class Tag extends Repository implements
    TagRepository,
    CreateRepository
{
    public function create($name, $url)
    {
        $tag = new Tag;
    }
}