<?php

namespace WPBin\Core\Usecase\Paste;

use WPBin\Core\Entity\Paste;
use WPBin\Core\Tool\Validator\Paste as PasteValidator;
use WPBin\Core\Usecase\Paste\CreateData;
use WPBin\Core\Usecase\Paste\CreateRepository;

class Create
{
    private $repo;
    private $validator;

    public function __construct(CreateRepository $repo, PasteValidator $validator)
    {
        $this->repo = $repo;
        $this->validator = $validator;
    }

    public function interact(CreateData $data)
    {
        $entity = new Paste([
            'title'     => $data->title,
            'content'   => $data->content,
            'parent_id' => $data->parent_id,
            'user_id'   => $data->user_id,
        ]);

        $this->validator->check($entity);

        return $this->repo->create($entity);
    }
}