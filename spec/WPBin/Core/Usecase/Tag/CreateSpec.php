<?php

namespace spec\WPBin\Core\Usecase\Tag;

use WPBin\Core\Entity\Tag;
use WPBin\Core\Tool\Validator\Tag as TagValidator;
use WPBin\Core\Exception\ValidatorException;
use WPBin\Core\Usecase\Tag\CreateRepository;
use WPBin\Core\Usecase\Tag\CreateData;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateSpec extends ObjectBehavior
{
    function let(CreateRepository $repo, CreateData $data, Tag $tag, TagValidator $validator)
    {
        $data->beConstructedWith(array());
        $data->name = 'wp_some_function';
        $data->url = 'http://codex.wordpress.org/function/wp_some_function';

        $repo->create(Argument::any())->willReturn($tag);
        $validator->check(Argument::any())->willReturn(true);

        $this->beConstructedWith($repo, $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Usecase\Tag\Create');
    }

    function it_interacts_and_returns_an_entity($data)
    {
        $this->interact($data)->shouldHaveType('WPBin\Core\Entity\Tag');
    }

    function it_interacts_and_throws_an_exception($repo, $data, TagValidator $validator)
    {
        $exception = new ValidatorException('wtf', ['it' => 'broke']);
        $validator->check(Argument::any())->willThrow($exception);

        $this->beConstructedWith($repo, $validator);

        $this->shouldThrow('WPBin\Core\Exception\ValidatorException')
            ->duringInteract($data);
    }
}