<?php

namespace WPBin\Web\Models;

use WPBin\Web\Model;

class Tag extends Model
{
    public $table = 'tags';
    protected $fillable = ['name', 'url'];
}