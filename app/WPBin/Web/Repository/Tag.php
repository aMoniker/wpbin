<?php

namespace WPBin\Web\Repository;

use WPBin\Web\Repository;
use WPBin\Web\Models\Tag as TagModel;

use WPBin\Core\Entity\TagRepository;
use WPBin\Core\Usecase\Tag\CreateData;
use WPBin\Core\Exception\ValidationException;

class Tag extends Repository implements TagRepository
{
    protected $entity = 'WPBin\Core\Entity\Tag';

    public function get($id)
    {
        return $this->entityFromModel(TagModel::find($id));
    }

    public function getAll()
    {
        return $this->entitiesFromCollection(TagModel::all());
    }

    public function getByName($name)
    {
        return $this->entityFromModel(TagModel::whereName($name)->first());
    }

    public function create($name, $url)
    {
        $usecase = \App::make('WPBin\Core\Usecase\Tag\Create');

        try {
            return $usecase->interact(new CreateData([
                'name' => $name,
                'url'  => $url,
            ]));
        } catch (ValidationException $e) {
            return null;
            // TODO: do something with the error here (pass to frontend?)
        }
    }
}