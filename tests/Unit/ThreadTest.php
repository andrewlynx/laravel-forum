<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected Thread $thread;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = Thread::factory()->create();
    }

    /** @test */
    public function a_thread_makes_correct_path()
    {
        $this->assertEquals("threads/{$this->thread->category->slug}/{$this->thread->id}", $this->thread->path());
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $this->assertInstanceOf(Collection::class, $this->thread->replies);
    }

    /** @test */
    public function a_thread_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->thread->creator);
    }

    /** @test */
    public function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'test reply',
            'user_id' => 1,
        ]);

        $this->assertCount(1, $this->thread->replies);
    }


    /** @test */
    function a_thread_belongs_to_a_category()
    {
        $thread = create(Thread::class);

        $this->assertInstanceOf(Category::class, $thread->category);
    }
}
