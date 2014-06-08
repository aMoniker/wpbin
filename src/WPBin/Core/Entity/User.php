<?php

namespace WPBin\Core\Entity;

use WPBin\Core\Entity;
use WPBin\Core\Traits\Entity\Timestamps;

class User extends Entity
{
    use Timestamps;

    protected $id;
    protected $first_name;
    protected $last_name;
    protected $username;
    protected $email;
    protected $active;

    protected $_accessors = [
        'id', 'first_name', 'last_name', 'username',
        'email', 'active', 'created', 'updated',
    ];
}