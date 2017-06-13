<?php

namespace AndreasElia\Tests\Integration;

use AndreasElia\Tests\IntegrationTestCase;

class PostTest extends IntegrationTestCase
{
    public function testCreatePost()
    {
        $response = $this->post(route('forum.posts.store'), ['content' => 'blah']);
        $response->assertResponseStatus(201);

        $this->seeInDatabase('posts', ['content' => 'blah']);
    }
}
