<?php

namespace WPBin\Core\Entity;

use WPBin\Core\Entity;
use WPBin\Core\Traits\Entity\Timestamps;

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
}