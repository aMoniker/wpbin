<?php

namespace WPBin\Entity;

use WPBin\Entity;

class User extends Entity
{
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $active;
    public $created;
    public $updated;
}