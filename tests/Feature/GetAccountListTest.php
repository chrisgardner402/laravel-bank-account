<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetAccountListTest extends TestCase
{
    public function test_valid_userid()
    {
        $userId = "1000000001";
        $response = $this->get("/accounts/" . $userId);
        $response->assertStatus(200);
    }

    public function test_invalid_userid()
    {
        $userId = "100000000";
        $response = $this->get("/accounts/" . $userId);
        $response->assertStatus(400);
    }
}
