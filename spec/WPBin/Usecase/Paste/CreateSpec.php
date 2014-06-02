<?php

namespace spec\WPBin\Usecase\Paste;

use WPBin\Entity\Paste;
use WPBin\Tool\Validator;
use WPBin\Usecase\Paste\CreateRepository;

use PhpSpec\ObjectBehavior;

class CreateSpec extends ObjectBehavior
{
    function let(CreateRepository $repo, Validator $valid, Paste $paste)
    {
        $paste->beConstructedWith([]);
        $paste->title = 'My Paste';
        $paste->content = 'omg all the code';

        $this->beConstructedWith($repo, $valid);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Usecase\Paste\Create');
    }

    function it_interacts_with_the_validator($valid, $repo, $paste)
    {
        $valid->check($paste)->shouldBeCalled()->willReturn(true);

        $repo->create(
            $paste->title,
            $paste->content,
            $paste->parent_id,
            $paste->user_id
        );

        $this->interact($paste);
    }
}
