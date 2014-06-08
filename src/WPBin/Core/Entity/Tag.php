<?php

namespace WPBin\Core\Entity;

use WPBin\Core\Entity;
use WPBin\Core\Traits\Entity\Timestamps;

class Tag extends Entity
{
    use Timestamps;

    protected $id;
    protected $name;
    protected $url;

    protected $_accessors = [
        'id', 'name', 'url', 'created', 'updated',
    ];
}