<?php

namespace spec\WPBin\Web\Repository\Tag;

use WPBin\Core\Entity\Tag;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class CreateSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Repository\Tag\Create');
    }

    function it_can_be_created(Tag $entity)
    {
        $entity->get('name')->willReturn('test_tag_1234');
        $entity->get('url')->willReturn('http://test.tag.ok');
        $entity->setByArray(Argument::any())->willReturn($entity);

        $this->create($entity)->shouldHaveType('WPBin\Core\Entity\Tag');
    }
}
