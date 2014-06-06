<?php

namespace spec\WPBin\Usecase\Tag;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateDataSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(array(
            'name' => 'foo',
            'url' => 'bar',
        ));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Usecase\Tag\CreateData');
    }

    function it_has_a_name()
    {
        $this->name->shouldBe('foo');
    }

    function it_has_a_url()
    {
        $this->url->shouldBe('bar');
    }
}
