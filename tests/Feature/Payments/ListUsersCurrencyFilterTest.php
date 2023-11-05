<?php

namespace Tests\Feature\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUsersCurrencyFilterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_currency_filter_success(): void
    {
        $response = $this->getJson(route('users', ['currency'=>'USD']));

        $response->assertStatus(200);
    }
}
