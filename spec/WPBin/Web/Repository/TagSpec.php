<?php

namespace spec\WPBin\Web\Repository;

use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class TagSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Repository\Tag');
    }

    function it_can_create_tags()
    {
        $tag = $this->create('test_tag_create_name', 'http://some.test.url')
            ->shouldHaveType('WPBin\Core\Entity\Tag');
    }

    function it_can_get_all_tags()
    {
        $this->getAll()->shouldBeArray();
    }

    function it_can_get_a_tag_by_id()
    {
        $tag = $this->create('test_tag_id_name', 'http://another.test.url');
        $this->get($tag->get('id'))->shouldHaveType('WPBin\Core\Entity\Tag');
    }

    function it_can_get_a_tag_by_name()
    {
        $tag = $this->create('test_tag_name_name', 'http://more.test.urls');
        $this->getByName('test_tag_name_name')
            ->shouldHaveType('WPBin\Core\Entity\Tag');
    }
}
