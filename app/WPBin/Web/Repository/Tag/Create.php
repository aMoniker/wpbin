<?php

namespace WPBin\Web\Repository\Tag;

use WPBin\Core\Entity\Tag;
use WPBin\Core\Usecase\Tag\CreateRepository;

use WPBin\Web\Repository;
use WPBin\Web\Models\Tag as TagModel;

class Create extends Repository implements CreateRepository
{
    public function create(Tag $entity)
    {
        $model = new TagModel(array(
            'name' => $entity->get('name'),
            'url'  => $entity->get('url')
        ));
        $model->save();

        $entity->setByArray($model->toEntityArray());
        return $entity;
    }
}