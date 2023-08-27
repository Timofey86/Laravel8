<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommandTest extends TestCase
{

    public function test_make_user()
    {
        $this->artisan('user:make')
            ->expectsQuestion('Email', 'test@example.com')
            ->assertSuccessful();

        $this->assertDatabaseHas('users',[
            'email' => 'test@example.com',
        ]);
    }
}
