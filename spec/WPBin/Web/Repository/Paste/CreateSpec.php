<?php

namespace spec\WPBin\Web\Repository\Paste;

use WPBin\Core\Entity\Paste;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class CreateSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Repository\Paste\Create');
    }

    function it_can_be_created(Paste $entity)
    {
        $entity->get('title')->willReturn('Paste Title');
        $entity->get('content')->willReturn('paste content');
        $entity->get('user_id')->willReturn(null);
        $entity->get('parent_id')->willReturn(null);
        $entity->setByArray(Argument::any())->willReturn($entity);

        $this->create($entity)->shouldHaveType('WPBin\Core\Entity\Paste');
    }
}
