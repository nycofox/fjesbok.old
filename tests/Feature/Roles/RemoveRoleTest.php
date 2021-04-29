<?php

namespace Tests\Feature\Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemoveRoleTest extends TestCase
{
    /** @test */
    function a_role_can_be_removed_from_a_user()
    {
        $user = User::factory()->create();

        $user->assignRole('test');

        $this->assertTrue($user->hasRole('test'));

        $user->removeRole('test');

        $this->assertFalse($user->fresh()->hasRole('test'));
    }
    
    function will_fail()
    {
        $this->assertTrue(false);
    }
}
