<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateRoleTest extends TestCase
{
    /** @test */
    function a_role_will_be_created_if_it_does_not_exist()
    {
        $user = User::factory()->create();

        $user->assignRole('test');

        $this->assertDatabaseCount('roles', 1);
    }

    /** @test */
    function a_role_will_not_be_created_if_it_already_exists()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $user1->assignRole('test');
        $user2->assignRole('test');

        $this->assertDatabaseCount('roles', 1);
    }

    /** @test */
    function a_user_will_tell_if_it_has_a_role()
    {
        $user = User::factory()->create();

        $user->assignRole('test');

        $this->assertTrue($user->hasRole('test'));
    }

    /** @test */
    function a_user_will_tell_if_it_does_not_have_a_role()
    {
        $user = User::factory()->create();

        $this->assertFalse($user->hasRole('test'));
    }
}
