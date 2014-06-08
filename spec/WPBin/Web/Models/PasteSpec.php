<?php

namespace spec\WPBin\Web\Models;

use PhpSpec\Laravel\EloquentModelBehavior;
use Prophecy\Argument;

class PasteSpec extends EloquentModelBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WPBin\Web\Models\Paste');
    }

    function it_should_have_a_table()
    {
        $this->table->shouldBe('pastes');
    }

    function it_should_have_fillable_defined()
    {
        $this->getFillable()->shouldReturn([
            'title', 'content', 'user_id', 'parent_id', 'hash'
        ]);
    }

    function it_should_be_able_to_save_data()
    {
        $this->title = 'Foo';
        $this->content = 'Bar';
        $this->save()->shouldBe(true);

    }

    function it_should_be_able_get_get_data()
    {
        $this::whereTitle('Foo')->first()->content->shouldBe('Bar');
    }
}
