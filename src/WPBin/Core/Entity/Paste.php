<?php

namespace WPBin\Core\Entity;

use WPBin\Core\Entity;
use WPBin\Core\Traits\Entity\Timestamps;
use WPBin\Core\Tool\Validator\Paste as PasteValidator;

class Paste extends Entity
{
    use Timestamps;

    protected $id;
    protected $parent_id;
    protected $hash;
    protected $title;
    protected $content;
    protected $user_id;

    protected $_accessors = [
        'id', 'parent_id', 'hash', 'title',
        'content', 'user_id', 'created', 'updated',
    ];

    public function __construct(Array $data, PasteValidator $validator)
    {
        $this->validator = $validator;
        parent::__construct($data);
    }
}