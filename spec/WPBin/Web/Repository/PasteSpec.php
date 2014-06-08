<?php

namespace spec\WPBin\Web\Repository;

use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class PasteSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Repository\Paste');
    }

    function it_can_create_pastes()
    {
        $this->create('My Super Paste', 'foo bar baz qux')
            ->shouldHaveType('WPBin\Core\Entity\Paste');
    }

    function it_can_get_a_paste_by_id()
    {
        $paste = $this->create('Another Great Paste', 'etc etc');
        $this->get($paste->get('id'))->shouldHaveType('WPBin\Core\Entity\Paste');
    }

    function it_can_get_a_paste_by_parent_id()
    {
        $paste = $this->create('Some Paste This Is', 'lol ok', null, 1);
        $this->getByParentID($paste->get('parent_id'))
            ->shouldHaveType('WPBin\Core\Entity\Paste');
    }

    // TODO: we'll need proper test seeding for tests like this
    // function it_can_get_a_paste_by_user_id()
    // {
    //     $paste = $this->create('What a Great Paste', 'hmm', 1);
    //     $this->getByUserID($paste->get('user_id'))
    //         ->shouldHaveType('WPBin\Core\Entity\Paste');
    // }

    function it_can_get_a_paste_by_hash()
    {
        $paste = $this->create('What a fine Paste this is', 'well?');
        $this->getByHash($paste->get('hash'))
            ->shouldHaveType('WPBin\Core\Entity\Paste');
    }
}
