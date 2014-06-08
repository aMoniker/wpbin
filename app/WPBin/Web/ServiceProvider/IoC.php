<?php

namespace WPBin\Web\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class IoC extends ServiceProvider {
    protected $bind_mappings = [
        'WPBin\Core\Usecase\Tag\CreateRepository'
            => 'WPBin\Web\Repository\Tag\Create',

        'WPBin\Core\Tool\Validator\Tag'
            => 'WPBin\Web\Tool\Validator\Tag',

        'WPBin\Core\Tool\Validator\Paste'
            => 'WPBin\Web\Tool\Validator\Paste',

        'WPBin\Core\Tool\Validator\User'
            => 'WPBin\Web\Tool\Validator\User',
    ];

    public function register()
    {
        foreach ($this->bind_mappings as $from => $to) {
            $this->app->bind($from, $to);
        }
    }
}