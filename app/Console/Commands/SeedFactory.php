<?php

namespace App\Console\Commands;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Console\Command;

class SeedFactory extends Command
{
    protected $signature = 'seed:factory';
    protected $description = 'Generate content by calling all factories at once.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $threads = Thread::factory()->count(50)->create();
        $threads->each(function ($thread) {Reply::factory()->count(10)->create(['thread_id' => $thread->id]); });
    }
}
