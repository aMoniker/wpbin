<?php

namespace spec\WPBinWeb\Repository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBinWeb\Repository\Tag');
    }
}
