<?php

namespace WPBin\Core\Usecase\Tag;

use WPBin\Core\Entity\Tag;
use WPBin\Core\Tool\Validator\Tag as TagValidator;
use WPBin\Core\Usecase\Tag\CreateData;
use WPBin\Core\Usecase\Tag\CreateRepository;

class Create
{
    private $repo;
    private $validator;

    public function __construct(CreateRepository $repo, TagValidator $validator)
    {
        $this->repo = $repo;
        $this->validator = $validator;
    }

    public function interact(CreateData $data)
    {
        $entity = new Tag([
            'name' => $data->name,
            'url'  => $data->url,
        ]);

        $this->validator->check($entity);

        return $this->repo->create($entity);
    }
}