<?php

namespace App\Filters;

use App\Models\User;

class ThreadFilters extends Filters
{
    protected array $globalFilters = [
        'order',
    ];

    protected array $filters = [
        'by', 'popular'
    ];

    protected function order(): void
    {
        $this->builder->orderByDesc('id');
    }

    protected function by($username): void
    {
        $user = User::where('name', $username)->firstOrFail();
        $this->builder->where('user_id', $user->id);
    }

    protected function popular(): void
    {
        $this->builder->getQuery()->orders = [];
        $this->builder->orderByDesc('replies_count');
    }
}
