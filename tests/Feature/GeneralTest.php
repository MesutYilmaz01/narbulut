<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GeneralTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_users()
    {
        User::factory(10)->create();
        $response = $this->get('/api/users');
        $response->assertSee('data');
        $response->assertJsonCount(10,'data');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_user_with_uuid()
    {
        User::insert(["email" => "abc@gmail.com", "uuid" => "12345", "name" => "example name", "password" => 123]);
        $response = $this->get('/api/user/12345');
        $response->assertSeeInOrder(['data', 'name']);
        $response->assertSeeInOrder(['data', 'email']);
        $response->assertSeeInOrder(['data', 'link']);
        $response->assertSeeInOrder(['data', 'uuid']);
        $response->assertStatus(200);
    }

    public function test_the_application_returns_organizations()
    {
        User::factory(20)->create();
        Organization::factory(30)->create();
        $response = $this->get('/api/organizations');
        $response->assertSee('data');
        $response->assertJsonCount(30,'data');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_organization_with_uuid()
    {
        Organization::insert([
            "email" => "abc@gmail.com",
            "uuid" => "12345",
            "name" => "example name",
            "phone" => 123,
            "address" => "address"
        ]);

        $response = $this->get('/api/organization/12345');

        $response->assertSeeInOrder(['data', 'uuid']);
        $response->assertSeeInOrder(['data', 'name']);
        $response->assertSeeInOrder(['data', 'email']);
        $response->assertSeeInOrder(['data', 'phone']);
        $response->assertSeeInOrder(['data', 'address']);
        $response->assertSeeInOrder(['data', 'link']);
        $response->assertStatus(200);
    }

}
