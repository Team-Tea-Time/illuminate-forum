<?php

namespace AndreasElia\Tests\Unit;

use AndreasElia\Forum\Models\Group;
use AndreasElia\Forum\ViewComposers\GroupComposer;
use AndreasElia\Tests\TestCase;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Mockery;

class GroupComposerTest extends TestCase
{
    public function testViewHasAllGroups()
    {
        factory(Group::class)->times(rand(0, 10))->create();
        $view = Mockery::mock(View::class);
        $view->shouldReceive('with')->withArgs(['groups', Mockery::type(Collection::class)])->andReturnSelf()->once();

        $viewComposer = new GroupComposer();
        $viewComposer->compose($view);
    }
}
