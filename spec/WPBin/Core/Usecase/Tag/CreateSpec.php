<?php

namespace spec\WPBin\Core\Usecase\Tag;

use WPBin\Core\Entity\Tag;
use WPBin\Core\Usecase\Tag\CreateRepository;
use WPBin\Core\Usecase\Tag\CreateData;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateSpec extends ObjectBehavior
{
    function let(CreateRepository $repo, CreateData $data, Tag $tag)
    {
        $data->beConstructedWith(array());
        $data->name = 'wp_some_function';
        $data->url = 'http://codex.wordpress.org/function/wp_some_function';

        $repo->create(Argument::any())->willReturn($tag);
        $this->beConstructedWith($repo);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Usecase\Tag\Create');
    }

    function it_interacts_and_returns_an_entity($data)
    {
        $this->interact($data)->shouldHaveType('WPBin\Core\Entity\Tag');
    }
}