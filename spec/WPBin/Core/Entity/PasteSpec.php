<?php

namespace spec\WPBin\Core\Entity;

use WPBin\Core\Tool\Validator\Paste as PasteValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PasteSpec extends ObjectBehavior
{
    function let(PasteValidator $validator)
    {
        $validator->check(Argument::any())->willReturn(true);

        $this->beConstructedWith([
            'id'        => 1,
            'parent_id' => 0,
            'hash'      => 'f00b4r',
            'title'     => 'Super Paste',
            'content'   => 'Awesome Paste Content',
            'user_id'   => 0,
            'created'   => strtotime('June 2nd 2014'),
            'updated'   => strtotime('June 2nd 2014 2:30pm'),
        ], $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Entity\Paste');
    }

    function it_can_get_its_id()
    {
        $this->get('id')->shouldBe(1);
    }

    function it_can_set_its_id()
    {
        $this->set('id', 2)->shouldBe(true);
    }

    function it_can_get_its_parent_id()
    {
        $this->get('parent_id')->shouldBe(0);
    }

    function it_can_set_its_parent_id()
    {
        $this->set('parent_id', 1)->shouldBe(true);
    }

    function it_can_get_its_hash()
    {
        $this->get('hash')->shouldBe('f00b4r');
    }

    function it_can_set_its_hash()
    {
        $this->set('hash', 'somehash')->shouldBe(true);
    }

    function it_can_get_its_title()
    {
        $this->get('title')->shouldBe('Super Paste');
    }

    function it_can_set_its_title()
    {
        $this->set('title', 'Another Paste Title')->shouldBe(true);
    }

    function it_can_get_its_content()
    {
        $this->get('content')->shouldBe('Awesome Paste Content');
    }

    function it_can_set_its_content()
    {
        $this->set('content', 'Some more content')->shouldBe(true);
    }

    function it_can_get_its_user_id()
    {
        $this->get('user_id')->shouldBe(0);
    }

    function it_can_set_its_user_id()
    {
        $this->set('user_id', 1)->shouldBe(true);
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
        $this->get('updated','d/m/y')
            ->shouldBe(date('d/m/y', strtotime('June 2nd 2014 2:30pm')));
    }

    function it_can_set_its_updated_timestamp()
    {
        $this->set('updated', strtotime('June 3rd 2014 3:00pm'))->shouldBe(true);
    }
}