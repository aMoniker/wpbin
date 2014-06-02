<?php

namespace WPBin\Usecase\Paste;

use WPBin\Entity\Paste;
use WPBin\Entity\PasteRepository;
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

    public function interact(Paste $paste)
    {
        $this->valid->check($paste);

        $paste->id = $this->repo->create(
            $paste->title,
            $paste->content,
            $paste->parent_id,
            $paste->user_id
        );

        return $paste->id;
    }
}