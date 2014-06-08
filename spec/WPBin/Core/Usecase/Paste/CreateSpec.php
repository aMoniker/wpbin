<?php

namespace spec\WPBin\Core\Usecase\Paste;

use WPBin\Core\Entity\Paste;
use WPBin\Core\Tool\Validator\Paste as PasteValidator;
use WPBin\Core\Exception\ValidatorException;
use WPBin\Core\Usecase\Paste\CreateData;
use WPBin\Core\Usecase\Paste\CreateRepository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateSpec extends ObjectBehavior
{
    function let(CreateRepository $repo, CreateData $data, Paste $paste, PasteValidator $validator)
    {
        $data->beConstructedWith(array());
        $data->title = 'My Paste';
        $data->content = 'omg all the code';

        $repo->create(Argument::any())->willReturn($paste);
        $validator->check(Argument::any())->willReturn(true);

        $this->beConstructedWith($repo, $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Usecase\Paste\Create');
    }

    function it_interacts_and_returns_an_entity($data)
    {
        $this->interact($data)->shouldHaveType('WPBin\Core\Entity\Paste');
    }

    function it_interacts_and_throws_an_exception(
        $repo, $data, PasteValidator $validator)
    {
        $exception = new ValidatorException('oops', ['oh' => 'shit']);
        $validator->check(Argument::any())->willThrow($exception);

        $this->beConstructedWith($repo, $validator);

        $this->shouldThrow('WPBin\Core\Exception\ValidatorException')
            ->duringInteract($data);
    }
}
