<?php

namespace WPBin\Entity;

use WPBin\Entity;

class Paste extends Entity
{
    public $id;
    public $parent_id;
    public $hash;
    public $title;
    public $content;
    public $user_id;
    public $created;
    public $updated;
}