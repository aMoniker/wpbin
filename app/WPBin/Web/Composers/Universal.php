<?php

namespace WPBin\Web\Composers;

final class Universal
{

    public function compose($view)
    {
        $debug = \Config::get('app.debug');

        $view
            ->with('debug', $debug)
            ->with('wpbin_tagline', 'wpbin.io is just the coolest Wordpress paste site, you know?')
            ;

        if ($debug) {
            $this->addDebug($view);
        }
    }

    private function addDebug($view)
    {
        $view
            ->with('host_ip', \Config::get('app.host_ip'))
            ;
    }

}