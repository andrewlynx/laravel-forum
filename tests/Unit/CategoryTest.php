<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function category_has_threads()
    {
        $category = create(Category::class);
        $thread = create(Thread::class, ['category_id' => $category->id]);

        $this->assertTrue($category->threads->contains($thread));
    }
}
