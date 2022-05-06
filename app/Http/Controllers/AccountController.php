<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = \App\Account::all();

        return response($accounts, 200)->header('Content-Type', 'application/json');
    }
}
