<?php

namespace WPBin\Core\Entity;

use WPBin\Core\Entity;
use WPBin\Core\Traits\Entity\Timestamps;
use WPBin\Core\Tool\Validator\Tag as TagValidator;

class Tag extends Entity
{
    use Timestamps;

    protected $id;
    protected $name;
    protected $url;

    protected $_accessors = [
        'id', 'name', 'url', 'created', 'updated',
    ];

    public function __construct(Array $data, TagValidator $validator)
    {
        $this->validator = $validator;
        parent::__construct($data);
    }
}