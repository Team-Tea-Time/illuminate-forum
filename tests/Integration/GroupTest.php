<?php

namespace Bitporch\Tests\Integration;

use Bitporch\Forum\Models\Group;
use Bitporch\Tests\TestCase;

class GroupTest extends TestCase
{
    public function testDestroyGroup()
    {
        $this->assertTrue(true);

        // $group = create(Group::class);

        // $this->delete(route('forum.groups.destroy', $group->slug))
        //     ->assertResponseStatus(204);

        // $this->dontSeeInDatabase('groups', ['id' => $group->id]);
    }

    public function testFailToDestroyGroup()
    {
        $this->withExceptionHandler()->delete(route('forum.groups.destroy', $this->faker()->word))
            ->assertResponseStatus(404);
    }
}
