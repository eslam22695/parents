<?php

namespace Tests\Feature\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUsersProviderFilterTest extends TestCase
{
    /**
     * feature test success provider.
     */
    public function test_provider_filter_success(): void
    {
        $response = $this->getJson(route('v1.users', ['provider'=>'DataProviderX']));

        $response->assertStatus(200);
    }
    
    /**
     * feature test error provider.
     */
    public function test_provider_filter_error(): void
    {
        $response = $this->getJson(route('v1.users', ['provider'=>'DataProviderZ']));

        $response->assertStatus(401);
    }
}
