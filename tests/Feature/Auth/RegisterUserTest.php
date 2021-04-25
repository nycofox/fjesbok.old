<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_register_an_account()
    {
        $this->post(route('register', $this->credentials()))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', ['name' => 'User Name']);

        $this->assertAuthenticated();
    }

    /** @test */
    function emails_must_be_unique()
    {
        User::factory()->create(['email' => 'user@example.com']);

        $this->post(route('register', $this->credentials()))
            ->assertSessionHasErrors('email');

    }

    /** @test */
    function passwords_must_be_at_least_8_characters()
    {
        $this->post(route('register', $this->credentials(['password' => '1234567'])))
            ->assertSessionHasErrors('password');
    }

    /** @test */
    function passwords_must_be_confirmed()
    {
        $this->post(route('register', $this->credentials(['password_confirmation' => '1234567'])))
            ->assertSessionHasErrors('password');
    }

    /** @test */
    function default_albums_are_created_when_a_user_registers()
    {
        $this->post(route('register', $this->credentials()))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseCount('albums', 2);
    }

    private function credentials($override = array())
    {
        return array_merge([
            'name' => 'User Name',
            'email' => 'user@example.com',
            'password' => 'SuperSecret123',
            'password_confirmation' => 'SuperSecret123'
        ], $override);
    }
}
