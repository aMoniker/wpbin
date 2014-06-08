<?php

namespace spec\WPBin\Web\Tool\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class TagSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Tool\Validator\Tag');
    }

    function it_should_catch_a_bad_id()
    {
        $this->shouldThrow('\WPBin\Core\Exception\ValidatorException')
            ->during('check', [['id' => 'foobar']]);
    }
}
