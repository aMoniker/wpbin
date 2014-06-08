<?php

namespace WPBin\Web\Repository;

use WPBin\Web\Repository;
use WPBin\Web\Models\Tag as TagModel;

use WPBin\Core\Entity\TagRepository;
use WPBin\Core\Usecase\Tag\CreateData;
use WPBin\Core\Exception\ValidationException;

class Tag extends Repository implements TagRepository {
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
        $usecase = \App::make('WPBin\Core\Usecase\Tag\Create');

        try {
            return $usecase->interact(new CreateData(array(
                'name' => $name,
                'url'  => $url,
            )));
        } catch (ValidationException $e) {
            return null;
        }
    }
}