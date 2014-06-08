<?php

namespace spec\WPBin\Web\Repository\Tag;

use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class CreateSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Repository\Tag\Create');
    }
}
