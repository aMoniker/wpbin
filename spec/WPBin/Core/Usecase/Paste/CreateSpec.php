<?php

namespace spec\WPBin\Core\Usecase\Paste;

use WPBin\Core\Usecase\Paste\CreateData;
use WPBin\Core\Usecase\Paste\CreateRepository;
use WPBin\Core\Tool\Validator;

use PhpSpec\ObjectBehavior;

class CreateSpec extends ObjectBehavior
{
    function let(CreateRepository $repo, Validator $valid, CreateData $data)
    {
        $data->beConstructedWith(array());
        $data->title = 'My Paste';
        $data->content = 'omg all the code';

        $this->beConstructedWith($repo, $valid);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Usecase\Paste\Create');
    }

    function it_interacts_with_the_validator($valid, $repo, $data)
    {
        $valid->check($data)->shouldBeCalled()->willReturn(true);
        $this->interact($data);
    }
}
