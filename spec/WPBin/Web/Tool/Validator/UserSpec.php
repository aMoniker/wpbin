<?php

namespace spec\WPBin\Web\Tool\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class UserSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Tool\Validator\User');
    }
}
