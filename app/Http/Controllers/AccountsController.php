<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Resources\AccountCollection;
use App\Http\Resources\Accounts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountsController extends Controller
{
    public function show($userid)
    {
        $accounts = Account::where('user_id', '=', $userid)->orderBy('account_id')->get();

        return Accounts::collection($accounts);
    }
}
