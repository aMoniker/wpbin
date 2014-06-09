<?php

namespace WPBin\Web\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class Composer extends ServiceProvider {

    public function register()
    {
        $this->app->view->composer('*', 'WPBin\Web\Composers\Universal');
    }

}