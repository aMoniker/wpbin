<?php

namespace spec\WPBin\Web\Tool;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Tool\Validator');
    }

    function it_should_return_a_successful_check()
    {
        $this->check([])->shouldBe(true);
    }
}
