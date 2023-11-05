<?php

namespace Tests\Feature\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUsersBlanceMaxFilterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_balance_max_filter_success(): void
    {
        $response = $this->getJson(route('v1.users', ['balanceMax'=>300]));

        $response->assertStatus(200);
    }
}
