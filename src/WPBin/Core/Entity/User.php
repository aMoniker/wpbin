<?php

namespace WPBin\Core\Entity;

use WPBin\Core\Entity;
use WPBin\Core\Traits\Entity\Timestamps;
use WPBin\Core\Tool\Validator\User as UserValidator;

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

    public function __construct(Array $data, UserValidator $validator)
    {
        $this->validator = $validator;
        parent::__construct($data);
    }
}