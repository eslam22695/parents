<?php

namespace Tests\Feature\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUsersBlanceMinFilterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_balance_min_filter_success(): void
    {
        $response = $this->getJson(route('users', ['balanceMin'=>100]));

        $response->assertStatus(200);
    }
}
