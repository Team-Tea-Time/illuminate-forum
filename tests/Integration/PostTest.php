<?php

namespace AndreasElia\Tests\Integration;

use AndreasElia\Forum\Models\Discussion;
use AndreasElia\Forum\Models\Post;
use AndreasElia\Tests\Stubs\Models\User;
use AndreasElia\Tests\TestCase;

class PostTest extends TestCase
{
    public function testCreatePost()
    {
        $discussion = factory(Discussion::class)->create();
        $user = factory(User::class)->create();
        $content = $this->faker()->sentence;

        $this->actingAs($user)
            ->post(route('forum.posts.store'), [
                'discussion_id' => $discussion->id,
                'content'       => $content,
            ])
            ->assertResponseStatus(302)
            ->assertRedirectedToRoute('forum.discussions.show', $discussion->id);

        $this->seeInDatabase('posts', ['content' => $content, 'discussion_id' => $discussion->id]);
    }

    public function testCreatePostValidation()
    {
        $this->post(route('forum.posts.store'))
            ->assertResponseStatus(302)
            ->assertSessionHasErrors([
                'content'       => 'The content field is required.',
                'discussion_id' => 'The discussion id field is required.',
            ]);
    }

    public function testDestroyPost()
    {
        $post = factory(Post::class)->create();

        $this->delete(route('forum.posts.destroy', $post->id))
            ->assertResponseStatus(302)
            ->assertRedirectedToRoute('forum.discussions.show', $post->discussion->id)
            ->assertSessionHas('success', 'Post deleted successfully.');

        $this->dontSeeInDatabase('posts', ['id' => $post]);
    }
}
