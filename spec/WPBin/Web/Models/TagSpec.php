<?php

namespace spec\WPBin\Web\Models;

use PhpSpec\Laravel\EloquentModelBehavior;
use Prophecy\Argument;

class TagSpec extends EloquentModelBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Models\Tag');
    }

    function it_should_have_a_table()
    {
        $this->table->shouldBe('tags');
    }

    function it_should_have_fillable_defined()
    {
        $this->getFillable()->shouldReturn(array('name', 'url'));
    }

    function it_should_be_able_to_save_data()
    {
        $this->name = 'test_tag';
        $this->url  = 'test_url';
        $this->save();
    }

    function it_should_be_able_get_get_data()
    {
        $this::whereName('test_tag')->first()->url->shouldBe('test_url');
    }
}
