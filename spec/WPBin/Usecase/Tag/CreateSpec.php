<?php

namespace spec\WPBin\Usecase\Tag;

use WPBin\Entity\Tag;
use WPBin\Tool\Validator;
use WPBin\Usecase\Tag\CreateRepository;
use WPBin\Usecase\Tag\CreateData;

use PhpSpec\ObjectBehavior;

class CreateSpec extends ObjectBehavior
{
    function let(CreateRepository $repo, Validator $valid, CreateData $data)
    {
        $data->beConstructedWith(array());
        $data->name = 'wp_some_function';
        $data->url = 'http://codex.wordpress.org/function/wp_some_function';

        $this->beConstructedWith($repo, $valid);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Usecase\Tag\Create');
    }

    function it_interacts_with_the_validator($repo, $valid, $data)
    {
        $valid->check($data)->shouldBeCalled()->willReturn(true);
        $this->interact($data);
    }
}