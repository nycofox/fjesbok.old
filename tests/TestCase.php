<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /**
     * Sign in as an existing user or create a new one
     *
     * @param null $user
     * @return TestCase
     */
    protected function signIn($user = null)
    {
        return $this->actingAs($user ?: User::factory()->create());
    }
}
