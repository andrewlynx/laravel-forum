<?php

namespace Tests;

use App\Exceptions\Handler;
use App\Models\User;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Throwable;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: create(User::class);

        $this->actingAs($user);

        return $this;
    }
}
