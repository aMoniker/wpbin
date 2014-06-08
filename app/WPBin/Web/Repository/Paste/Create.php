<?php

namespace WPBin\Web\Repository\Paste;

use WPBin\Core\Entity\Paste;
use WPBin\Core\Usecase\Paste\CreateRepository;

use WPBin\Web\Repository;
use WPBin\Web\Models\Paste as PasteModel;

class Create extends Repository implements CreateRepository
{
    public function create(Paste $entity)
    {
        // TODO: handle the rare occurence of a hash collision
        $hash = base_convert(mt_rand(50000, 99999999999), 10, 36);

        $model = new PasteModel([
            'title'     => $entity->get('title'),
            'content'   => $entity->get('content'),
            'user_id'   => $entity->get('user_id'),
            'parent_id' => $entity->get('parent_id'),
            'hash'      => $hash,
        ]);

        $model->save();

        $entity->setByArray($model->toEntityArray());
        return $entity;
    }
}