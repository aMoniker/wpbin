<?php

namespace WPBin\Core\Usecase\Tag;

use WPBin\Core\Entity\Tag;
use WPBin\Core\Usecase\Tag\CreateData;
use WPBin\Core\Usecase\Tag\CreateRepository;

class Create
{
    private $repo;

    public function __construct(CreateRepository $repo)
    {
        $this->repo = $repo;
    }

    public function interact(CreateData $data)
    {
        $entity = \App::make('WPBin\Core\Entity\Tag', [[
            'name' => $data->name,
            'url'  => $data->url,
        ]]);

        return $this->repo->create($entity);
    }
}