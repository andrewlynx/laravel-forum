<?php

namespace Tests\Feature;

use App\Models\Thread;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_new_threads()
    {
        $this->post('/threads')
            ->assertRedirect('/login');

        $this->get('/threads/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_threads()
    {
        $this->signIn();

        $thread = make(Thread::class);
        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}