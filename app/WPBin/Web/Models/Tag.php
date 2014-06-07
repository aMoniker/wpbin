<?php

namespace WPBin\Web\Models;

use Eloquent;

class Tag extends Eloquent
{
    public $table = 'tags';
    protected $fillable = array('name', 'url');
}
