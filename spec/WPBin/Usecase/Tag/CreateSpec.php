<?php

namespace spec\WPBin\Usecase\Tag;

use WPBin\Entity\Tag;
use WPBin\Tool\Validator;
use WPBin\Usecase\Tag\CreateRepository;

use PhpSpec\ObjectBehavior;

class CreateSpec extends ObjectBehavior
{
    function let(CreateRepository $repo, Validator $valid, Tag $tag)
    {
        $tag->beConstructedWith([]);
        $tag->name = 'wp_some_function';
        $tag->url = 'codex.wordpress.org/function/wp_some_function';

        $this->beConstructedWith($repo, $valid);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Usecase\Tag\Create');
    }

    function it_interacts_with_the_validator($valid, $repo, $tag)
    {
        $valid->check($tag)->shouldBeCalled()->willReturn(true);

        $repo->create(
            $tag->name,
            $tag->url
        );

        $this->interact($tag);
    }
}