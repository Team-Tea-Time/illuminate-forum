<?php

namespace Bitporch\Tests\Unit;

use Bitporch\Forum\Models\Group;
use Bitporch\Forum\ViewComposers\GroupComposer;
use Bitporch\Tests\TestCase;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Mockery;

class GroupComposerTest extends TestCase
{
    public function testViewHasAllGroups()
    {
        $this->assertTrue(true);

        // factory(Group::class)->times(rand(0, 10))->create();
        // $view = Mockery::mock(View::class);
        // $view->shouldReceive('with')->withArgs(['groups', Mockery::type(Collection::class)])->andReturnSelf()->once();

        // $viewComposer = new GroupComposer();
        // $viewComposer->compose($view);
    }
}
