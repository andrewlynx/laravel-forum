<?php

namespace Tests\Feature;

use App\Models\Reply;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FavouritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_can_not_favorite_anything()
    {
        $this->post('replies/1/favorites')
            ->assertRedirect('/login');
    }

    /** @test */
    public function logged_in_user_can_favorite_any_reply()
    {
        $this->signIn();
        $reply = create(Reply::class);

        $this->post('replies/' . $reply->id . '/favorites');
        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function logged_in_user_can_favorite_a_reply_once()
    {
        $this->signIn();
        $reply = create(Reply::class);

        $this->post('replies/' . $reply->id . '/favorites');
        $this->post('replies/' . $reply->id . '/favorites');
        $this->assertCount(1, $reply->favorites);
    }
}
