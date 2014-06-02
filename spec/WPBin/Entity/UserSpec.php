<?php

namespace spec\WPBin\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'id'         => 1,
            'first_name' => 'Paste',
            'last_name'  => 'Face',
            'username'   => 'pasteface',
            'email'      => 'paste@fa.ce',
            'active'     => 1,
            'created'    => strtotime('June 2nd 2014'),
            'updated'    => strtotime('June 2nd 2014 2:30pm'),
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Entity\User');
    }

    function it_has_an_id()
    {
        $this->id->shouldBe(1);
    }

    function it_has_a_first_name()
    {
        $this->first_name->shouldBe('Paste');
    }

    function it_has_a_last_name()
    {
        $this->last_name->shouldBe('Face');
    }

    function it_has_a_username()
    {
        $this->username->shouldBe('pasteface');
    }

    function it_has_an_email()
    {
        $this->email->shouldBe('paste@fa.ce');
    }

    function it_has_an_active_flat()
    {
        $this->active->shouldBe(1);
    }

    function it_has_a_created_timestamp()
    {
        $this->created->shouldBe(strtotime('June 2nd 2014'));
    }

    function it_has_an_updated_timestamp()
    {
        $this->updated->shouldBe(strtotime('June 2nd 2014 2:30pm'));
    }

    function it_can_set_data_from_an_array()
    {
        // ArrayExchange trait
        $this->setData(array('username' => 'pasteyface'))->shouldReturn($this);
        $this->username->shouldBe('pasteyface');
    }

    function it_can_be_converted_to_an_array()
    {
        // ArrayExchange trait
        $this->asArray()->shouldHaveKey('username');
    }
}