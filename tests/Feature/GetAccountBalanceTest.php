<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAccountBalanceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $accountId = "10010000001";
        $response = $this->get('/account/' . $accountId . "/balance");

        $response->assertStatus(200);
    }
}
