<?php

namespace spec\WPBin\Core\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidatorExceptionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'error-message',
            array('omg' => 'errors')
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Exception\ValidatorException');
    }

    function it_has_a_message()
    {
        $this->getMessage()->shouldBe('error-message');
    }

    function it_can_get_its_errors()
    {
        $this->getErrors()->shouldBe(array('omg' => 'errors'));
    }

    function it_can_set_its_errors()
    {
        $this->setErrors(array('wtf' => 'lol'));
        $this->getErrors()->shouldBe(array('wtf' => 'lol'));
    }
}