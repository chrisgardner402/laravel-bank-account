<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetAccountBalanceTest extends TestCase
{
    public function test_valid_account_id()
    {
        $accountId = "10010000001";
        $response = $this->get('/account/' . $accountId . "/balance");
        $response->assertStatus(200);
    }

    public function test_invalid_account_id()
    {
        $accountId = "1001000000";
        $response = $this->get('/account/' . $accountId . "/balance");
        $response->assertStatus(400);
    }
}
