<?php

namespace WPBin\Web\Repository;

use WPBin\Web\Repository;
use WPBin\Web\Models\Tag as TagModel;
use WPBin\Core\Entity\Tag as TagEntity;
use WPBin\Core\Entity\TagRepository;
use WPBin\Core\Usecase\Tag\CreateRepository;

class Tag extends Repository implements
    TagRepository,
    CreateRepository
{
    protected $entity = 'WPBin\Core\Entity\Tag';

    public function get($id)
    {
        $tag = TagModel::find($id);
        if (!$tag) { return null; }
        return $this->entityFromModel($tag);
    }

    public function getByName($name)
    {
        $tag = TagModel::whereName($name)->first();
        if (!$tag) { return null; }
        return $this->entityFromModel($tag);
    }

    public function create($name, $url)
    {
        // validate here

        $tag = new TagModel(array(
            'name' => $name,
            'url'  => $url,
        ));
        $tag->save();

        return $this->entityFromModel($tag);
    }
}