<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function unauthenticated_user_cannot_reply()
    {
        $this->expectException(AuthenticationException::class);

        $this->post('threads/1/replies', []);
    }

    /** @test */
    function an_authenticated_user_can_participate_in_forum_thread()
    {
        $user = User::factory()->create();
        $this->be($user);
        $thread = Thread::factory()->create();
        $reply = Reply::factory()->create();

        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);

    }
}
