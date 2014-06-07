<?php

namespace spec\WPBin\Web\Repository;

use src\WPBin\Core\Entity\Tag;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Repository\Tag');
    }

    function it_can_create_tags()
    {
        $tag = $this->create('test_tag_create_name', 'test_tag_create_url')
            ->shouldHaveType('WPBin\Core\Entity\Tag');
    }

    function it_can_get_a_tag_by_id()
    {
        $tag = $this->create('test_tag_id_name', 'test_tag_id_url');
        $this->get($tag->id)->shouldHaveType('WPBin\Core\Entity\Tag');
    }

    function it_can_get_a_tag_by_name()
    {
        $tag = $this->create('test_tag_name_name', 'test_tag_name_url');
        $this->getByName('test_tag_name_name')
            ->shouldHaveType('WPBin\Core\Entity\Tag');
    }
}
