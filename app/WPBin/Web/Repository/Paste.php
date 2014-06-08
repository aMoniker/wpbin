<?php

namespace WPBin\Web\Repository;

use WPBin\Web\Repository;
use WPBin\Web\Models\Paste as PasteModel;

use WPBin\Core\Entity\PasteRepository;
use WPBin\Core\Usecase\Paste\CreateData;
use WPBin\Core\Exception\ValidationException;

class Paste extends Repository implements PasteRepository
{
    protected $entity = 'WPBin\Core\Entity\Paste';

    public function get($id)
    {
        $paste = PasteModel::find($id);
        return $this->entityFromModel($paste);
    }

    public function getByParentID($parent_id)
    {
        $paste = PasteModel::whereParentId($parent_id)->first();
        return $this->entityFromModel($paste);
    }

    public function getByUserID($user_id)
    {
        $paste = PasteModel::whereUserId($user_id)->first();
        return $this->entityFromModel($paste);
    }

    public function getByHash($hash)
    {
        $paste = PasteModel::whereHash($hash)->first();
        return $this->entityFromModel($paste);
    }

    public function create($title, $content, $user_id = null, $parent_id = null)
    {
        $usecase = \App::make('WPBin\Core\Usecase\Paste\Create');

        try {
            return $usecase->interact(new CreateData(array(
                'title'     => $title,
                'content'   => $content,
                'user_id'   => $user_id,
                'parent_id' => $parent_id
            )));
        } catch (ValidationException $e) {
            return null; // TODO: something meaningful with exceptions
        }
    }
}
