<?php

namespace WPBin\Core\Usecase\Tag;

use WPBin\Core\Usecase\Tag\CreateData;
use WPBin\Core\Usecase\Tag\CreateRepository;
use WPBin\Core\Tool\Validator;

class Create
{
    private $repo;
    private $valid;

    public function __construct(CreateRepository $repo, Validator $valid)
    {
        $this->repo = $repo;
        $this->valid = $valid;
    }

    public function interact(CreateData $data)
    {
        $this->valid->check($data);

        return $this->repo->create(
            $data->name,
            $data->url
        );
    }
}