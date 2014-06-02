<?php

namespace spec\WPBin\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'id'      => 1,
            'name'    => 'wp_do_the_stuff',
            'url'     => 'codex.wordpress.com/functionthingy/wp_do_the_stuff',
            'created' => strtotime('June 2nd 2014'),
            'updated' => strtotime('June 2nd 2014 2:30pm'),
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Entity\Tag');
    }

    function it_has_an_id()
    {
        $this->id->shouldBe(1);
    }

    function it_has_a_name()
    {
        $this->name->shouldBe('wp_do_the_stuff');
    }

    function it_has_a_url()
    {
        $this->url->shouldBe('codex.wordpress.com/functionthingy/wp_do_the_stuff');
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
        $this->setData(array('name' => 'wp_all_the_things'))->shouldReturn($this);
        $this->name->shouldBe('wp_all_the_things');
    }

    function it_can_be_converted_to_an_array()
    {
        // ArrayExchange trait
        $this->asArray()->shouldHaveKey('name');
    }
}