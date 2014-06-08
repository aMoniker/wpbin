<?php

namespace WPBin\Web\Repository\Tag;

use WPBin\Core\Entity\Tag;
use WPBin\Web\Repository;
use WPBin\Web\Models\Tag as TagModel;

use WPBin\Core\Usecase\Tag\CreateRepository;

class Create extends Repository implements CreateRepository
{
    public function create(Tag $entity)
    {
        $tag = new TagModel(array(
            'name' => $entity->get('name'),
            'url'  => $entity->get('url')
        ));
        $tag->save();

        return \App::make('WPBin\Core\Entity\Tag', [$tag->toEntityArray()]);
    }
}