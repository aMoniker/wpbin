<?php

namespace spec\WPBin\Core\Entity;

use WPBin\Core\Tool\Validator\Tag as TagValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    function let(TagValidator $validator)
    {
        $validator->check(Argument::any())->willReturn(true);

        $this->beConstructedWith([
            'id'      => 1,
            'name'    => 'wp_do_the_stuff',
            'url'     => 'codex.wordpress.com/functionthingy/wp_do_the_stuff',
            'created' => strtotime('June 2nd 2014'),
            'updated' => strtotime('June 2nd 2014 2:30pm'),
        ], $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Entity\Tag');
    }

    function it_can_get_its_id()
    {
        $this->get('id')->shouldBe(1);
    }

    function it_can_set_its_id()
    {
        $this->set('id', 2)->shouldBe(true);
    }

    function it_can_get_its_name()
    {
        $this->get('name')->shouldBe('wp_do_the_stuff');
    }

    function it_can_set_its_name()
    {
        $this->set('name', 'setnametest')->shouldBe(true);
    }

    function it_can_get_its_url()
    {
        $this->get('url')
            ->shouldBe('codex.wordpress.com/functionthingy/wp_do_the_stuff');
    }

    function it_can_set_its_url()
    {
        $this->set('url', 'http://foo.bar.baz')->shouldBe(true);
    }

    function it_can_get_its_created_timestamp()
    {
        $this->get('created')->shouldBe(strtotime('June 2nd 2014'));
    }

    function it_can_get_its_created_timestamp_in_another_format()
    {
        $this->get('created', 'd/m/y')
            ->shouldBe(date('d/m/y', strtotime('June 2nd 2014')));
    }

    function it_can_set_its_created_timestamp()
    {
        $this->set('created', strtotime('June 3rd 2014'))->shouldBe(true);
    }

    function it_can_get_its_updated_timestamp()
    {
        $this->get('updated')->shouldBe(strtotime('June 2nd 2014 2:30pm'));
    }

    function it_can_get_its_updated_timestamp_in_another_format()
    {
        $this->get('updated', 'd/m/y')
            ->shouldBe(date('d/m/y', strtotime('June 2nd 2014 2:30pm')));
    }

    function it_can_set_its_updated_timestamp()
    {
        $this->set('updated', strtotime('June 3rd 2014 3:00pm'))
            ->shouldBe(true);
    }
}