<?php

namespace spec\WPBin\Core\Entity;

use WPBin\Core\Tool\Validator\User as UserValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function let(UserValidator $validator)
    {
        $validator->check(Argument::any())->willReturn(true);

        $this->beConstructedWith([
            'id'         => 1,
            'first_name' => 'Paste',
            'last_name'  => 'Face',
            'username'   => 'pasteface',
            'email'      => 'paste@fa.ce',
            'active'     => 1,
            'created'    => strtotime('June 2nd 2014'),
            'updated'    => strtotime('June 2nd 2014 2:30pm'),
        ], $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Core\Entity\User');
    }

    function it_can_get_its_id()
    {
        $this->get('id')->shouldBe(1);
    }

    function it_can_set_its_id()
    {
        $this->set('id', 2)->shouldBe(true);
    }

    function it_can_get_its_first_name()
    {
        $this->get('first_name')->shouldBe('Paste');
    }

    function it_can_set_its_first_name()
    {
        $this->set('first_name', 'Etsap')->shouldBe(true);
    }

    function it_can_get_its_last_name()
    {
        $this->get('last_name')->shouldBe('Face');
    }

    function it_can_set_its_last_name()
    {
        $this->set('last_name', 'Ecaf')->shouldBe(true);
    }

    function it_can_get_its_username()
    {
        $this->get('username')->shouldBe('pasteface');
    }

    function it_can_set_its_username()
    {
        $this->set('username', 'ecafetsap')->shouldBe(true);
    }

    function it_can_get_its_email()
    {
        $this->get('email')->shouldBe('paste@fa.ce');
    }

    function it_can_set_its_email()
    {
        $this->set('email', 'etsap@ec.af');
    }

    function it_can_get_its_active_flag()
    {
        $this->get('active')->shouldBe(1);
    }

    function it_can_set_its_active_flag()
    {
        $this->set('active', 0)->shouldBe(true);
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
        $this->set('updated', strtotime('June 3rd 2014 3:00pm'))->shouldBe(true);
    }
}