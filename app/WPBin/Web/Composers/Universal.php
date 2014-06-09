<?php

namespace WPBin\Web\Composers;

final class Universal
{

    public function compose($view)
    {
        $debug = \Config::get('app.debug');

        $view
            ->with('debug', $debug)
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