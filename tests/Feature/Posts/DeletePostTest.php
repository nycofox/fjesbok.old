<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeletePostTest extends TestCase
{
    /** @test */
    function guests_cannot_delete_posts()
    {
        $post = Post::factory()->create();

        $this->post(route('post.destroy', $post))
            ->assertStatus(302);
    }

    /** @test */
    function a_user_cannot_delete_other_users_posts()
    {
        $post = Post::factory()->create();

        $this->signIn();

        $this->post(route('post.destroy', $post))
            ->assertStatus(403);
    }

    /** @test */
    function a_user_can_delete_their_own_post()
    {
        $user = User::factory()->create();

        $this->signIn($user);

        $post = Post::factory()->create(['user_id' =>  $user->id]);

        $this->assertDatabaseCount('posts', 1);

        $this->post(route('post.destroy', $post))
            ->assertStatus(302);

        $this->assertSoftDeleted($post);
    }

}
