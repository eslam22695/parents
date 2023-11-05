<?php

namespace Tests\Feature\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUsersStausFilterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_status_filter_success(): void
    {
        $response = $this->getJson(route('users', ['statusCode'=>'authorized']));

        $response->assertStatus(200);
    }
}
