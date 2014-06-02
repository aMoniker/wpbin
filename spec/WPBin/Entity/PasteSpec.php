<?php

namespace spec\WPBin\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PasteSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'id'        => 1,
            'parent_id' => 0,
            'hash'      => 'f00b4r',
            'title'     => 'Super Paste',
            'content'   => 'Awesome Paste Content',
            'user_id'   => 0,
            'created'   => strtotime('June 2nd 2014'),
            'updated'   => strtotime('June 2nd 2014 2:30pm'),
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Entity\Paste');
    }

    function it_has_an_id()
    {
        $this->id->shouldBe(1);
    }

    function it_has_a_parent_id()
    {
        $this->parent_id->shouldBe(0);
    }

    function it_has_a_hash()
    {
        $this->hash->shouldBe('f00b4r');
    }

    function it_has_a_title()
    {
        $this->title->shouldBe('Super Paste');
    }

    function it_has_some_content()
    {
        $this->content->shouldBe('Awesome Paste Content');
    }

    function it_has_a_user_id()
    {
        $this->user_id->shouldBe(0);
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
        $this->setData(array('title' => 'Hello there'))->shouldReturn($this);
        $this->title->shouldBe('Hello there');
    }

    function it_can_be_converted_to_an_array()
    {
        // ArrayExchange trait
        $this->asArray()->shouldHaveKey('title');
    }
}