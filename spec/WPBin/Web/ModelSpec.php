<?php

namespace spec\WPBin\Web;

use PhpSpec\Laravel\EloquentModelBehavior;
use Prophecy\Argument;

class ModelSpec extends EloquentModelBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Model');
    }
}
