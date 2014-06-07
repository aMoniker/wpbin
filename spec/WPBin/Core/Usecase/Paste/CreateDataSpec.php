<?php

namespace spec\WPBin\Core\Usecase\Paste;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateDataSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(array(
            'title'     => 'paste_title',
            'content'   => 'paste_content',
            'parent_id' => 0,
            'user_id'   => 1,
        ));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Usecase\Paste\CreateData');
    }

    function it_has_a_title()
    {
        $this->title->shouldBe('paste_title');
    }

    function it_has_content()
    {
        $this->content->shouldBe('paste_content');
    }

    function it_has_a_parent_id()
    {
        $this->parent_id->shouldBe(0);
    }

    function it_has_a_user_id()
    {
        $this->user_id->shouldBe(1);
    }
}
