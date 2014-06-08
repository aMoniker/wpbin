<?php

namespace WPBin\Web\Models;

use WPBin\Web\Model;

class Paste extends Model
{
    public $table = 'pastes';
    protected $fillable = ['title', 'content', 'user_id', 'parent_id', 'hash'];
}