<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function test_valid_userid()
    {
        $userId = "1000000001";
        $response = $this->get("/users/" . $userId . "/accounts");
        $response->assertStatus(200);
    }

    public function test_invalid_userid()
    {
        $userId = "100000000";
        $response = $this->get("/users/" . $userId . "/accounts");
        $response->assertStatus(400);
    }
}
