<?php

namespace WPBin\Usecase\Tag;

use WPBin\Entity\Tag;
use WPBin\Entity\Tag\Repository;
use WPBin\Tool\Validator;

class Create
{
    private $repo;
    private $valid;

    public function __construct(CreateRepository $repo, Validator $valid)
    {
        $this->repo = $repo;
        $this->valid = $valid;
    }

    public function interact(Tag $tag)
    {
        $this->valid->check($tag);

        $tag->id = $this->repo->create(
            $tag->name,
            $tag->url
        );

        return $tag->id;
    }
}