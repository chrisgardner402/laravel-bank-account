<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccountControllerTest extends TestCase
{
    public function test_get_balances_with_valid_account_id()
    {
        $accountId = "10010000001";
        $response = $this->get('/accounts/' . $accountId . "/balances");
        $response->assertStatus(200);
    }

    public function test_get_balances_with_invalid_account_id()
    {
        $accountId = "1001000000";
        $response = $this->get('/accounts/' . $accountId . "/balances");
        $response->assertStatus(400);
    }

    public function test_get_transactions_with_valid_account_id()
    {
        $accountId = "10010000001";
        $response = $this->get('/accounts/' . $accountId . "/transactions");
        $response->assertStatus(200);
    }

    public function test_get_transactions_with_invalid_account_id()
    {
        $accountId = "1001000000";
        $response = $this->get('/accounts/' . $accountId . "/transactions");
        $response->assertStatus(400);
    }
}
